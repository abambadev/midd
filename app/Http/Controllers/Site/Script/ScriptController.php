<?php

namespace App\Http\Controllers\Site\Script;

use App\Mail\ExpirationDomainReservationMail;
use App\Mail\ExpirationHostingMail;
use App\Mail\NewHostingMail;
use App\Mail\PermutationAuthorHostingOrDomainMail;
use App\Mail\SponsorshipUseTokenRegisterMail;
use App\Mail\TransferHostingServerToAnotherServerMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Domaine;
use App\Models\Hebergement;
use App\Models\Record;
use App\Models\Serveur;
use App\myClass\CloudFlareApi;
use App\myClass\CwpApi;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Runner\Exception;

class ScriptController extends Controller
{
    public function getShow(Request $request)
    {

        if ($request->token == config('perso.ScriptToken')) {
            switch ($request->action) {
                case "autologin":
                    $user = User::where('id', $request->user)->first();

                    if (!empty($user)) {
                        Auth::logout();
                        Auth::loginUsingId($request->user);
                        return redirect()->route('Admin-HomeGetShow');
                    } else {
                        die("autologin - Utilisateu #" . $request->user . " inconnu");
                    }
                    break;
                case "cwp_api":

                    // $serveur = Serveur::where('id', 3)->first();
                    // $CwpApi = new CwpApi($serveur->cwp_api_url, $serveur->cwp_api_key);
                    // $response = $CwpApi->AccountList();

                    // $domaines = Domaine::get();

                    // foreach ($domaines as $key => $domaine) {

                    //     $CloudFlare  = new CloudFlareApi(
                    //         $domaine->getServeur->cloudflare_api_url,
                    //         $domaine->getServeur->cloudflare_api_email,
                    //         $domaine->getServeur->cloudflare_api_key
                    //     );

                    //     $req = $CloudFlare->ZoneRecordsCreate(
                    //         $domaine->item,
                    //         'A',
                    //         '*.' . $domaine->domain,
                    //         $domaine->getServeur->ip,
                    //         false
                    //     );

                    //     dump($domaine, $req);
                    // }

                    dd('fin');

                    break;
                default:
                    die("Action inconnu !");
                    break;
            }
        } else {

            die("Token incorect !");
        }
    }
}
