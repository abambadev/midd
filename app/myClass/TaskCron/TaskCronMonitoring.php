<?php

namespace App\myClass\TaskCron;

use App\Models\Monitoring;

class TaskCronMonitoring
{
    static function check()
    {
        $listeUrl = Monitoring::get();

        foreach ($listeUrl as $value) {

            try {

                $client = new \GuzzleHttp\Client();
                $check = $client->request('GET', $value->url);
                $value->update(
                    [
                        'statu' => $check->getStatusCode() ?? 0,
                        'updated_at' => now(),
                    ]
                );

                // Envoi de mail de notification si statu <> 200
            } catch (\Exception $e) {
                dd($e);
            }
        }
    }
}
