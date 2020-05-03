<?php

namespace App\Http\Controllers\Site\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Mail\ActivationCompteMail;
use App\Mail\SponsorshipUseTokenRegisterMail;
use App\Models\Pays;
use App\myClass\AlphaIncrement;
use App\myClass\Flasher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function getShow(Request $request)
    {

        if (Auth::check() == true) {
            return redirect()->route('Admin-HomeGetShow');
        }

        $data['pays'] = Pays::orderBy('nom_fr_fr')->get();
        return view('page.admin.register.show', $data);
    }

    public function postShow(RegisterFormRequest $request)
    {

        $request->merge(
            [
                'password' => Hash::make($request->password),
                'activation_token' => (string) Str::uuid(),
            ]
        );

        // Creation du User
        $user = User::create(
            $request->only(
                [
                    'nom', 'prenom', 'contact_mtn', 'phone', 'email', 'pays_id', 'ville', 'password', 'activation_token'
                ]
            )
        );

        $code = new AlphaIncrement(15);
        $user->update(
            [
                'code' => strtolower($code->encode($user->id))
            ]
        );

        // envoi du mail d'activation
        $MailData = $request->only(['nom', 'prenom']);
        $MailData['activation_url'] = route('Site-ActiverGetShow', ['uuid' => $request->activation_token]);
        try {
            Mail::to($request->email, $request->nom . ' ' . $request->prenom)
                ->send(new ActivationCompteMail($MailData));
        } catch (\Exception $e) {
        }

        Flasher::success("Félicitation! Votre inscription a été effectuée avec succès. Un mail d'activation a été envoyé à " . $request->email);

        return redirect()->route('Site-LoginGetShow');
    }

    public function postAjax(Request $request)
    {
        if ($request->req == 1001) { // check pays flag

            $data = Pays::where('id', $request->id)->first();
            $data = asset('/file/image/flag/' . $data->alpha2 . '.png');
        }
        return $data;
    }
}
