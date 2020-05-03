<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordFormRequest;
use App\Http\Requests\ProfilUpdateFormRequest;
use App\Models\LoginSession;
use App\Models\Message;
use App\Models\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfilController extends Controller
{

	public function getShow(Request $request)
	{
		return view('page.admin.profil.show');
	}

	public function postShow(ChangePasswordFormRequest $request)
	{
		if ( ! Hash::check($request->password_old, Auth::user()->password) ) {
			$request->session()->flash('MsgFlash', [
	            'type' => "error",
	            'msg' => 'Mot de passe actuel incorrrect',
        	]);
            return redirect()->back()->withInput();
		}

		Auth::user()->update(['password' => Hash::make($request->password)]);

		$request->session()->flash('MsgFlash', [
	        'type' => "success",
	        'msg' => "Mise à jour effectuée avec succès"
        ]);
        return redirect()->back();
	}

	public function getEdite(Request $request)
	{
		$data['pays'] = Pays::orderBy('nom_fr_fr')->get();
		return view('page.admin.profil.edite', $data);
	}

	public function postEdite(ProfilUpdateFormRequest $request)
	{

	    $donne = null;

	    if ( $request->photo <> null ) {

			$image_name = (string) Str::uuid().'.png';

    		Image::make($request->photo->getPathName())->resize(160, 160)
				->save(public_path('/file/image/users/'.$image_name));

			$donne = $request->all();

			$donne['photo'] = $image_name;

	    } else {

	    	$donne = $request->all();

	    }

	    Auth::user()->update( $donne );

	    $request->session()->flash('MsgFlash', [
	        'type' => "success",
	        'msg' => "Mise à jour effectuée avec succès"
        ]);
        return redirect()->route('Admin-ProfilGetShow');

	}

}
