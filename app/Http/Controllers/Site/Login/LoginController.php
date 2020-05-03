<?php

namespace App\Http\Controllers\Site\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\LoginSession;
use App\myClass\Flasher;
use App\User;
use Browser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ReCaptcha\ReCaptcha;

class LoginController extends Controller
{

    public function getShow()
    {
        if (Auth::check() == true) {
            return redirect()->route('Admin-HomeGetShow');
        }
        return view('page.admin.login.show');
    }

    public function postShow(LoginFormRequest $request)
    {

        // Verification captcha
        // $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));

        // $resp = $recaptcha->setExpectedHostname($request->server('HTTP_HOST'))
        //     ->setExpectedAction('homepage')
        //     ->setScoreThreshold(0.5)
        //     ->verify($request->recaptcha, $request->ip());

        // if (!$resp->isSuccess()) {
        //     Flasher::error("Impossible de soumettre votre formulaire");
        //     return redirect()->route('Site-HomeGetShow');
        // }

        $user = User::where('email', $request->email)->where('etat', 1)->first();

        if ($user <> null && Hash::check($request->password, $user->password)) {

            Auth::loginUsingId($user->id, $request->remember == 'on' ? true : false);

            $ip = $request->server('HTTP_X_FORWARDED_FOR');
            $ip_check = LoginSession::where('ip', $ip)->first();

            if ($ip_check <> null) {

                $pays_code = $ip_check->pays_code;
                $pays_name = $ip_check->pays_name;
                $ville = $ip_check->ville;
            } else {

                try {
                    $ip_check = json_decode(file_get_contents('http://ip-api.com/json/' . $ip . '?lang=fr'));
                } catch (\Exception $e) {}

                $pays_code = $ip_check ? $ip_check->countryCode : null;
                $pays_name = $ip_check ? $ip_check->country : null;
                $ville = $ip_check ? $ip_check->city : null;
            }

            LoginSession::create(
                [
                    'users_id' => Auth::id(),
                    'ip' => $request->ip(),
                    'pays_code' => $pays_code,
                    'pays_name' => $pays_name,
                    'ville' => $ville,
                    'appareil' => Browser::deviceFamily() . ' - ' . Browser::deviceModel(),
                    'os' => Browser::platformName(),
                    'navigateur' => Browser::browserName(),
                    'action' => 'Connexion',
                    'user_agent' => $request->server('HTTP_USER_AGENT'),
                ]
            );

            if (!empty($request->from)) {
                return redirect(urldecode($request->from));
            }
            return redirect()->route('Admin-HomeGetShow');
        } else {

            Flasher::error("Identifiant ou mot de passe incorrect");
            return redirect()->back()->withInput();
        }
    }
}
