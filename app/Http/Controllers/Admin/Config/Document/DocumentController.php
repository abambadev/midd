<?php

namespace App\Http\Controllers\Admin\Config\Document;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{

    public function getShow(Request $request)
    {
        $data['documents'] = User::get();
        return view('page.admin.config.document.show', $data);

    }

    public function getAdhesion(Request $request, User $uuid)
	{
        $data['adhesion'] =User::join('ecoles','ecoles.id','users.service')
                                ->join('secteurs','secteurs.id','ecoles.secteur_id')
                                ->join('inspections','inspections.id','secteurs.iep_id')
                                ->join('directions','directions.id','inspections.dren_id')
                                ->join('fonctions','fonctions.id','users.fonction_midd')
                                ->where('users.uuid',$uuid->uuid)
                                ->select('users.*','secteurs.libelle as secteur','inspections.libelle as iep'
                                        ,'directions.libelle as dren','fonctions.libelle as fonction','ecoles.libelle as service'
                                        )
                                ->first();

		return view('layouts.admin.adhesion', $data);
    }

	public function getPrecompte(Request $request, User $uuid)
	{

        $data['precompte'] =User::join('ecoles','ecoles.id','users.service')
                                ->join('secteurs','secteurs.id','ecoles.secteur_id')
                                ->join('inspections','inspections.id','secteurs.iep_id')
                                ->join('directions','directions.id','inspections.dren_id')
                                ->join('fonctions','fonctions.id','users.fonction_midd')
                                ->where('users.uuid',$uuid->uuid)
                                ->select('users.*','secteurs.libelle as secteur','inspections.libelle as iep'
                                        ,'directions.libelle as dren','fonctions.libelle as fonction','ecoles.libelle as service'
                                        )
                                ->first();
            //dd($data['precompte']);
		return view('layouts.admin.precompte', $data);
    }

}
