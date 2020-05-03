<?php

namespace App\myClass\TaskCron;

use App\Mail\ExpirationHostingMail;
use App\Models\Hebergement;
use Illuminate\Support\Facades\Mail;

/**
 *
 */

class TaskCronHebergement
{

    static function UpdateExpiryDate()
    {
        $hebergements = Hebergement::get();

        foreach ($hebergements as $hebergement) {
            $package = $hebergement->getPackage;
            $user = $hebergement->getUser;
            try {
                Mail::to($user->email, $user->nom . ' ' . $user->prenom)
                    ->send(new ExpirationHostingMail([
                        'first_name' => $user->nom,
                        'last_name' => $user->prenom,
                        'host_expiration_date' => $hebergement->expire_at,
                        'package_name' => $package->package_name,
                        'hebergement' => $hebergement->user,
                    ]));
            } catch (\Exception $e) { }
        }
    }
}
