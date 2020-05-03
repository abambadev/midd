<?php

namespace App\Http\Controllers\Site\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetFormRequest;
use App\Mail\PasswordResetMail;
use App\Models\EventType;
use App\myClass\Flasher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use ReCaptcha\ReCaptcha;

class PasswordController extends Controller
{
    public function getShow(Request $request)
    {

        if (Auth::check() == true) {
            return redirect()->route('Admin-HomeGetShow');
        }
        return view('page.admin.password.show');
    }

    public function postShow(Request $request)
    {

        // Verification captcha
        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));

        $resp = $recaptcha->setExpectedHostname($request->server('HTTP_HOST'))
            ->setExpectedAction('homepage')
            ->setScoreThreshold(0.5)
            ->verify($request->recaptcha, $request->ip());

        if (!$resp->isSuccess()) {
            Flasher::error("Impossible de soumettre votre formulaire");
            return redirect()->route('Site-HomeGetShow');
        }

        $user = User::where('email', $request->email)->first();

        if ($user <> null) {

            $token = (string) Str::uuid();

            User::where('id', $user->id)->update(
                [
                    'password_token' => $token,
                ]
            );

            // envoi de mail d'activation
            $DataMail = [
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'reset_url' => route('Site-PasswordGetReset', ['uuid' => $token]),
            ];
            try {
                Mail::to($request->email, $user->nom . ' ' . $user->prenom)
                    ->send(new PasswordResetMail($DataMail));
            } catch (\Exception $e) {
            }

            Flasher::success("Un lien de réinitialisation a été envoyé à " . $request->email);

            return redirect()->route('Site-HomeGetShow');
        } else {

            Flasher::error("Aucun compte n’est rattaché a ce email");
            return redirect()->back()->withInput();
        }
    }

    public function getReset(Request $request, $uuid)
    {

        $user = User::where('password_token', $uuid)->first();

        if ($user == null) {
            Flasher::error("Oups! Ce token n'est pas valide");
            return redirect()->route('Site-HomeGetShow');
        }

        return view('page.admin.password.reset');
    }

    public function postReset(PasswordResetFormRequest $request, $uuid)
    {

        // Verification captcha
        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));

        $resp = $recaptcha->setExpectedHostname($request->server('HTTP_HOST'))
            ->setExpectedAction('homepage')
            ->setScoreThreshold(0.5)
            ->verify($request->recaptcha, $request->ip());

        if (!$resp->isSuccess()) {
            Flasher::error("Impossible de soumettre votre formulaire");
            return redirect()->route('Site-HomeGetShow');
        }
        
        $user = User::where('password_token', $uuid)->first();

        if ($user <> null) {

            if ($request->email <> $user->email) {
                Flasher::error("Aucun compte n’est rattaché a ce email");
                return redirect()->back()->withInput();
            }

            $token = (string) Str::uuid();

            $user->update(
                [
                    'password' => Hash::make($request->password),
                ]
            );

            Flasher::success("Votre mot de passe a été correctement réinitialisé");

            return redirect()->route('Site-LoginGetShow');
        } else {
            Flasher::error("Oups! Ce token n'est pas valide");
            return redirect()->back()->withInput();
        }
    }
}
