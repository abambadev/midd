<?php

namespace App\Http\Controllers\Site\Activer;

use App\Http\Controllers\Controller;
use App\myClass\Flasher;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiverController extends Controller
{

    public function getShow(Request $request, $uuid)
    {

        if (Auth::check() == true) {
            return redirect()->route('Admin-HomeGetShow');
        }

    	$user = User::where('activation_token', $uuid)->first();

    	if ($user == null) {

            Flasher::error("Oups ! Le token d’activation n’est pas correct");

            return redirect()->route('Site-HomeGetShow');

    	} else {

    		$user->update([
                'activation_token' => null,
    			'etat' => 1,
    			'etat_by' => Auth::id(),
    			'etat_at' => date('Y-m-d H:i:s'),
            ]);

    		Auth::loginUsingId($user->id, true);

            Flasher::success("Félicitation votre compte a été correctement activé");

            return redirect()->route('Admin-HomeGetShow');

    	}

    }

}
