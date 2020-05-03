<?php

namespace App\myClass\TaskCron;

use App\Models\Watcher;
use App\myClass\WhoisDomain;

class TaskCronWatcher
{
    static function check()
    {
        $listeUrl = Watcher::get();

        foreach ($listeUrl as $value) {

            try {

                $check = new WhoisDomain($value->domaine);

                $value->update(
                    [
                        'statu' => $check->isRegistered() ? 1 : 0,
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
