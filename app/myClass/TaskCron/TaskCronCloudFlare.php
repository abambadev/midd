<?php

namespace App\myClass\TaskCron;

use App\Models\Domaine;
use App\Models\Record;
use App\Models\Serveur;
use App\myClass\CloudFlareApi;
use Illuminate\Support\Facades\DB;


class TaskCronCloudFlare
{

    static function UpdateZone()
    {
        $serveurs = Serveur::get();

        foreach ($serveurs as $key => $serveur) {

            $api_url = $serveur->cloudflare_api_url;
            $api_email = $serveur->cloudflare_api_email;
            $api_key = $serveur->cloudflare_api_key;


            $CloudFlare = new CloudFlareApi($api_url, $api_email, $api_key);

            $req = $CloudFlare->ZoneListe();

            if ($req->success == true) {
                self::foreachDomaineUpdate($req->result);
            }

            $page = $req->result_info->total_pages;

            if ($page > 1) {

                for ($i = $page; $i < ($page + 1); $i++) {

                    $req = $CloudFlare->ZoneListe($page);

                    if ($req->success == true) {
                        self::foreachDomaineUpdate($req->result);
                    }
                }
            }
        }
    }

    static function foreachDomaineUpdate($data)
    {
        foreach ($data as $key => $value) {

            $domaine = Domaine::where('domain', $value->name)->first();
            if ($domaine) {
                $domaine->update([
                    'item' => $value->id,
                    'status' => $value->status,
                    'registrar' => isset($value->original_registrar) ? $value->original_registrar : null,
                    'paused' => $value->paused,
                    'dev_mode' => $value->development_mode,
                    'ns1' => $value->name_servers[0],
                    'ns2' => $value->name_servers[1],
                    'cloudflare_data' => json_encode($value),
                ]);
            }
        }
    }
}
