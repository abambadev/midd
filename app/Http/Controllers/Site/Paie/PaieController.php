<?php

namespace App\Http\Controllers\Site\Paie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CodePromo;
use App\Models\Commande;
use App\myClass\CinetPay;
use App\myClass\Flasher;
use App\myClass\SystemPoint;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaieController extends Controller
{
    public function getBon(Request $request, Commande $uuid)
    {

        if ($uuid->expire_at < now() || $uuid->etat <> null) {
            Flasher::error("Le bon de paiement n'est plus disponible");
            if (Auth::check()) {
                return redirect()->back();
            }
            return redirect()->route('Site-HomeGetShow');
        }

        $data['commande'] = $uuid;

        $data['montant'] = $uuid->montant;

        // Verifier si code promo existe et valide
        $data['code_promo'] = CodePromo::where('code', $uuid->code_promo)
            ->where('quota', '>', 0)
            ->where('debut_at', '<', now())
            ->where('fin_at', '>', now())
            ->where('etat', 1)
            ->first();

        if ($data['code_promo'] <> null) {
            $data['montant_ht'] = $data['montant'] - ($data['montant'] * ($data['code_promo']->reduction / 100));
        } else {
            $data['montant_ht'] = $data['montant'];
        }

        $data['montant_ttc'] = $data['montant_ht'] + ($data['montant_ht'] * (env('APP_TVA') / 100)); // $uuid->montnat; // Montant a calculer en tenant compte du code promo et de la TVA

        try {
            // Paramétrage du panier CinetPay et affichage du formulaire
            $CinetPay = new CinetPay(env('CINETPAY_SITEID'), env('CINETPAY_APIKEY'), "PROD", "V2");
            $CinetPay->setTransId($uuid->uuid)
                ->setDesignation("Service " . env('APP_NAME'))
                ->setTransDate(date("Y-m-d H:i:s"))
                ->setAmount($data['montant_ttc']) // 100
                ->setDebug(false) // Valorisé à true, si vous voulez activer le mode debug sur cinetpay afin d'afficher toutes les variables envoyées chez CinetPay
                ->setCustom(strval($uuid->user_id)) // optional 
                ->setNotifyUrl(route('Site-PaieGetIpn', ['uuid' => $uuid->uuid])) // optional
                ->setReturnUrl(route('Site-PaieGetRetour', ['uuid' => $uuid->uuid])) // optional
                ->setCancelUrl(route('Site-PaieGetBon', ['uuid' => $uuid->uuid])); // optional
            $data['CinetPay'] = $CinetPay;
        } catch (\Exception $e) {

            // Une erreur est survenue
            dd($e->getMessage());
        }

        return view('page.site.paiement.bon', $data);
    }

    public function getIpn(Request $request, Commande $uuid)
    {
        if (isset($request->cpm_trans_id)) {

            try {

                // Initialisation de CinetPay et Identification du paiement
                $id_transaction = $request->cpm_trans_id;
                $apiKey = env('CINETPAY_APIKEY');
                $site_id = env('CINETPAY_SITEID');
                $plateform = "PROD"; // Valorisé à PROD si vous êtes en production
                $version = "V2"; // Valorisé à V1 si vous voulez utiliser la version 1 de l'api
                $CinetPay = new CinetPay($site_id, $apiKey, $plateform, $version);

                // Reprise exacte des bonnes données chez CinetPay
                $CinetPay->setTransId($id_transaction)->getPayStatus();

                // Verification des données
                if ($CinetPay->_cpm_result == '00' && $uuid->montant >= $CinetPay->_cpm_amount) { // || $uuid->montant < $CinetPay->_cpm_amount

                    $payment_data = [
                        'montant_ttc' => $CinetPay->_cpm_amount,
                        'currency' => $CinetPay->_cpm_currency,
                        'payer_id' => Auth::id(),
                        'site_id' => $CinetPay->_cpm_site_id,
                        'trans_id' => $CinetPay->_cpm_payid,
                        'payment_datetime' => $CinetPay->_created_at,
                        'error_message' => $CinetPay->_cpm_error_message,
                        'payment_method' => $CinetPay->_payment_method,
                        'phone_prefixe' => $CinetPay->_cpm_phone_prefixe,
                        'phone_num' => $CinetPay->_cel_phone_num,
                        'buyer_name' => $buyer_name = $CinetPay->_buyer_name,
                        'status' => $CinetPay->_cpm_trans_status,
                        'result' => $CinetPay->_cpm_result,
                        'etat' => 1,
                        'etat_by' => Auth::id(),
                        'etat_at' => now(),
                    ];
                    $payment_data['payment_data'] = \json_encode($payment_data);
                    $data['payment_data'] = $payment_data;

                    // Mise a jour des donnée du
                    $uuid->update($data['payment_data']);

                    // Action point 
                    $user = User::where('id', $uuid->user_id)->first();
                    $SystemPoint = new SystemPoint($user, 'achat-bonus');
                    $SystemPoint->runProcessActionAmount($uuid->montant);

                    if ($user->getParrain <> null) {

                        $SystemPoint = new SystemPoint($user->getParrain, 'parrainage-achat');
                        $SystemPoint->runProcessActionAmount($uuid->montant);
                    }
                }
            } catch (\Exception $e) {

                die("Erreur :" . $e->getMessage());
            }
        } else {

            die();
        }
    }

    public function getRetour(Request $request, Commande $uuid)
    {

        if ($uuid->expire_at < now()) {
            Flasher::error("Le bon de paiement n'est plus disponible");
            return redirect()->route('Site-HomeGetShow');
        }

        $data['commande'] = $uuid;

        if ($uuid->etat == 1) {

            $data['payment_data'] = $uuid->toArray();
        } elseif (isset($request->cpm_trans_id)) {

            try {

                // Initialisation de CinetPay et Identification du paiement
                $id_transaction = $request->cpm_trans_id;
                $apiKey = env('CINETPAY_APIKEY');
                $site_id = env('CINETPAY_SITEID');
                $plateform = "PROD"; // Valorisé à PROD si vous êtes en production
                $version = "V2"; // Valorisé à V1 si vous voulez utiliser la version 1 de l'api
                $CinetPay = new CinetPay($site_id, $apiKey, $plateform, $version);

                // Reprise exacte des bonnes données chez CinetPay
                $CinetPay->setTransId($id_transaction)->getPayStatus();
                $payment_data = [
                    'montant_ttc' => $CinetPay->_cpm_amount,
                    'currency' => $CinetPay->_cpm_currency,
                    'payer_id' => Auth::id(),
                    'site_id' => $CinetPay->_cpm_site_id,
                    'trans_id' => $CinetPay->_cpm_payid,
                    'payment_datetime' => $CinetPay->_created_at,
                    'error_message' => $CinetPay->_cpm_error_message,
                    'payment_method' => $CinetPay->_payment_method,
                    'phone_prefixe' => $CinetPay->_cpm_phone_prefixe,
                    'phone_num' => $CinetPay->_cel_phone_num,
                    'buyer_name' => $buyer_name = $CinetPay->_buyer_name,
                    'status' => $CinetPay->_cpm_trans_status,
                    'result' => $CinetPay->_cpm_result,
                    'etat' => 1,
                    'etat_by' => Auth::id(),
                    'etat_at' => now(),
                ];
                $payment_data['payment_data'] = \json_encode($payment_data);
                $data['payment_data'] = $payment_data;

                // Verification des données
                if ($CinetPay->_cpm_result <> '00' && $uuid->montant >= $CinetPay->_cpm_amount) { // || 
                    Flasher::error("Le bon de paiement n'est plus disponible");
                    return redirect()->route('Site-HomeGetShow');
                }

                // Mise a jour des donnée du 
                $uuid->update($data['payment_data']);
            } catch (\Exception $e) {

                dd("Erreur :" . $e->getMessage());
            }
        } else {

            die();
        }

        return view('page.site.paiement.retour', $data);
    }

    public function getFacture(Request $request, Commande $uuid)
    {

        if ($uuid->result <> '00') {
            Flasher::error("La facture n'est pas disponible");
            if (Auth::check()) {
                return redirect()->back();
            }
            return redirect()->route('Site-HomeGetShow');
        }

        $data['commande'] = $uuid;

        return view('page.site.paiement.facture', $data);
    }
}
