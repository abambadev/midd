<?php

namespace App\myClass\TaskCron;

use App\Models\Domaine;
use App\Models\Hebergement;
use App\Models\Record;
use App\Models\RecordDefault;
use App\myClass\CwpApi;
use App\myClass\WhoisDomain;
use Illuminate\Support\Str;

/**
 *
 */

class TaskCronCwp
{

    // static function DomaineCreate()
    // {
    // 	$domaine = Domaine::whereNull('cron_add_serveur')->whereNull('item')->first();

    // 	if ($domaine) {

    // 		$CwpApi = new CwpApi($domaine->getServeur->cwp_api_url, $domaine->getServeur->cwp_api_key);

    // 		$data = [
    // 			'user' => $domaine->getHebergement->user,
    // 			'name' => $domaine->domain,
    // 			'path' => str_ireplace('/home/'.$domaine->getHebergement->user.'/public_html/'.$domaine->domain, null, $domaine->path),
    // 		];

    // 		try {

    // 			$req = $CwpApi->DomaineCreate($data);

    // 			dump($req);

    // 			if (isset($req->status) && $req->status == 'OK') {
    // 				$domaine->update(['cron_add_serveur' => now()]);

    // 				$record_default = RecordDefault::get();

    // 				foreach ($record_default as $key => $value) {
    // 					Record::create([
    // 						'domaines_id' => $domaine->id,
    // 						'type' => $value->type,
    // 						'name' => str_replace('@', $domaine->domain, $value->name),
    // 						'content' => str_replace(
    // 							['@','Serv_Ip','Serv_rDNS'],
    // 							[$domaine->domain, $domaine->getServeur->ip, $domaine->getServeur->rdns],
    // 							$value->content,
    // 						),
    // 						'priority' => $value->priority,
    // 						'proxiable' => $value->proxiable,
    // 						'proxied' => $value->proxied,
    // 					]);
    // 				}

    // 			}
    // 		} catch (Exception $e) {
    // 			// Envoi de mail de notification pour signaler
    // 			// => impossible d'ajouter le domaine sur le serveur
    // 			dump( $e->getMessage() );
    // 		}

    // 	}

    // }

    static function SousDomaineRecordCreate()
    {

        $hebergement = Hebergement::where('etat', 1)->get();

        foreach ($hebergement as $key => $value) {

            $CwpApi = new CwpApi($value->getServeur->cwp_api_url, $value->getServeur->cwp_api_key);

            $req = $CwpApi->SousDomaineList($value->user);

            if (isset($req->status) && $req->status == 'OK' && is_array($req->msj)) {

                foreach ($req->msj as $key => $item) {

                    $record = Record::where('name', $item->subdomain)->first();

                    $prefixe = explode('.', parse_url($item->subdomain)['path'])[0];
                    $host = Str::replaceFirst($prefixe . '.', null, $item->subdomain);
                    $domaine = Domaine::where('domain', $host)->first();

                    if (empty($record) && !empty($domaine)) {

                        $record_default = RecordDefault::where('type', 'A')->first();

                        Record::create([
                            'domaines_id' => $domaine->id,
                            'type' => $record_default->type,
                            'name' => str_replace('@', $item->subdomain, $record_default->name),
                            'content' => str_replace(
                                ['@', 'Serv_Ip', 'Serv_rDNS'],
                                [$item->subdomain, $value->getServeur->ip, $value->getServeur->rdns],
                                $record_default->content
                            ),
                            'priority' => $record_default->priority,
                            'proxiable' => $record_default->proxiable,
                            'proxied' => $record_default->proxied,
                        ]);
                    }
                }
            }
        }
    }
}
