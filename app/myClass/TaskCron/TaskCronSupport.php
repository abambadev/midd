<?php

namespace App\myClass\TaskCron;

use App\Models\Support;

class TaskCronSupport
{
    /**
     * [closeTicket ferme un ticket si pas de reponse apres 72h]
     *
     * @return  [type]  [return description]
     */
    static function closeTicket()
    {
        $limite = now()->subDay(3);

        $ticket = Support::where('etat', 1)
            ->whereDate('updated_at', '<', $limite)
            ->get();

        foreach ($ticket as $value) {
            $value->update(
                [
                    'etat' => 0,
                    'etat_at' => now(),
                ]
            );
        }
    }
}
