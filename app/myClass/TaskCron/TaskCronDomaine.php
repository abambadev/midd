<?php

namespace App\myClass\TaskCron;

use App\Mail\ExpirationDomainReservationMail;
use App\Models\Domaine;
use App\myClass\WhoisDomain;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

/**
 *
 */

class TaskCronDomaine
{

    /**
     * Methode permettant de mettre a jour la date d'expiration d'un domaine
     *
     * @return void
     */
    static function UpdateExpiryDate()
    {

        $domains = Domaine::get();

        foreach ($domains as $domain) {

            $WhoisDomain = new WhoisDomain($domain->domain);
            $date = $WhoisDomain->getExpiryDate();

            // Verifie si date d'expiration existe
            if ($date <> false) {

                $date = Carbon::create($date);

                // Mise a jour de la date d'expiration du domaine 
                $domain->update(
                    [
                        'expire_at' => $date,
                    ]
                );

                // Envoi de message d'alert si la date d'expiration reste 30 jours
                if (now()->diffInDays($date, false) >= 0 && now()->diffInDays($date, false) <= 30) {

                    try {

                        $user = $domain->getUser;

                        Mail::to($user->email, $user->nom . ' ' . $user->prenom)
                            ->send(
                                new ExpirationDomainReservationMail(
                                    [
                                        'first_name' => $user->nom,
                                        'last_name' => $user->prenom,
                                        'domain_name' => $domain->domain,
                                        'domain_expiration_date' => $date,
                                    ]
                                )
                            );
                    } catch (\Exception $e) {
                    }
                }
            }
        }
    }

    /**
     * Methode permetant d'actualiser le screenShot d'un domaine
     *
     * @return void
     */
    static function UpdateScreenshot()
    {

        $domains = Domaine::get();

        foreach ($domains as $key => $domain) {

            $image_name = $domain->domain . '.png';

            $url = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=http://' . $domain->domain . '&screenshot=true';

            $info = null;

            try {

                $info = @file_get_contents($url);
            } catch (\Exception $e) {
            }

            if ($info <> null) {

                $data = json_decode($info, true);

                if (isset($data["screenshot"]['data']) && !empty($data["screenshot"]['data'])) {

                    $img = $data["screenshot"]['data'];
                    $img = str_replace('_', '/', $img);
                    $img = str_replace('-', '+', $img);
                    $img = 'data:' . $data["screenshot"]["mime_type"] . ';base64,' . $img;

                    Image::make($img)
                        ->save(public_path('/file/image/domaine-screenshot/' . $image_name));
                }
            }
        }
    }
}
