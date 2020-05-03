<?php

namespace App\Http\Controllers\Admin\Config\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminFormRequest;
use App\Mail\NotificationMail;
use App\Models\LoginSession;
use App\Models\Pays;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function getShow(Request $request)
    {
    	$data['users'] = User::get();
    	return view('page.admin.config.user.show', $data);
    }

    public function getProfil(Request $request, User $uuid)
    {
        $data['user'] = $uuid;
        return view('page.admin.config.user.profil', $data);
    }

    public function getEtat(Request $request, User $uuid)
    {
        $uuid->etat == 1 ? $uuid->update(['etat' => 0]) : $uuid->update(['etat' => 1]);

		$request->session()->flash('MsgFlash', [
            'type'=>"success",
            'msg'=>"Le compte été mis à jour avec succès."
        ]);
		return redirect()->back();
    }

    public function getCreate(Request $request)
    {
        $data['pays'] = Pays::orderBy('nom_fr_fr')->get();
    	return view('page.admin.config.user.create', $data);
    }

    public function postCreate(RegisterAdminFormRequest $request)
    {

        $password = mt_rand(10000,99999);

        $request->merge([
            'password' => Hash::make($password),
            'activation_token' => (string)Str::uuid(),
        ]);

        $user = User::create($request->only([
            'nom', 'prenom', 'phone', 'email', 'pays_id', 'ville', 'password', 'activation_token'
        ]));

        // envoi de mail d'activation
        $MailData = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'msg' => "Votre compte a été créé par un administrateur, <br><br>
                Votre identifiant : ".$request->email."<br>
                Votre mot de passe : ".$password."<hr>
                <a href='".route('Site-ActiverGetShow', ['uuid' => $request->activation_token])."' style='color: #ffffff; font-weight: bold;'>
                    ".route('Site-ActiverGetShow', ['uuid' => $request->activation_token])."
                </a><br>
            ",
        ];
        try {
            Mail::to($request->email, $request->nom . ' ' . $request->prenom)
                ->send(new NotificationMail($MailData));
        } catch (Exception $e) { }

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Compte créer avec succès. Un mail d'activation a été envoyé à ".$request->email,
        ]);

        return redirect()->route('Admin-Config-UserGetShow');

    }

    public function getDelete(Request $request, User $uuid)
    {
    	$data['user'] = $uuid;
    	return view('page.admin.config.user.delete', $data);
    }


    public function postDelete(Request $request, User $uuid)
    {
        // Supprimer egalement ['historique','licence']

    	$uuid->delete();

        $request->session()->flash('MsgFlash', [
            'type'=>"success",
            'msg'=>"Compte supprimé avec succès."
        ]);
        return redirect()->route('Admin-Config-UserGetShow');

    }

    public function getRole(Request $request, User $uuid)
    {

        $data['user'] = $uuid;
        $data['role'] = Role::get();
        return view('page.admin.config.user.role', $data);

    }

    public function postRole(Request $request, User $uuid)
    {

        if ( $request->role == '0' ) {
            $request->session()->flash('MsgFlash', [
                'type'=>"error",
                'msg'=>"Sélectionnez un rôle."
            ]);
            return redirect()->back()->withInput();
        }

        $uuid->attachRole($request->role);

        $request->session()->flash('MsgFlash', [
            'type'=>"success",
            'msg'=>"Rôle ajouté avec succès."
        ]);
        return redirect()->route('Admin-Config-UserGetShow');

    }


}
