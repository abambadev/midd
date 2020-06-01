<?php

namespace App\Http\Controllers\Admin\Config\Ecole;

use App\Http\Controllers\Controller;
use App\Http\Requests\EcoleFormRequest;
use App\Models\Ecole;
use App\Models\Inspection;
use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EcoleController extends Controller
{

    public function getShow(Request $request)
    {
        $data['ecoles'] = Ecole::join('secteurs','secteurs.id','ecoles.secteur_id')
                                ->select('ecoles.*','secteurs.libelle as secteur')->get();
        return view('page.admin.config.ecole.show', $data);

    }

    public function getCreate(Request $request)
    {
        $data['secteurs'] = Secteur::where('deleted_by',null)->get();

        return view('page.admin.config.ecole.create',$data);

    }

    public function postCreate(EcoleFormRequest $request)
    {
        try {

            $ecole = Ecole::create([
                'uuid' => (string)Str::uuid(),
                'libelle' => $request->libelle,
                'secteur_id' => $request->secteur_id
            ]);

            $request->session()->flash('MsgFlash', [
                'type' => "success",
                'msg' => "Ecole ajouté avec succès."
            ]);
        } catch (\Exception $e) {

            $request->session()->flash('MsgFlash', [
                'type' => "Error",
                'msg' => "Une erreur est survenue lors de l'enregistrement."
            ]);

            dd($e->getMessage());
        }

        return redirect()->route('Admin-Config-EcoleGetShow');

    }

    public function getDelete(Request $request,Ecole $uuid)
    {

        $data['ecole'] = $uuid;
        return view('page.admin.config.ecole.delete', $data);

    }

    public function postDelete(Request $request,Ecole $uuid)
    {

        $uuid->delete();

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Ecole supprimé avec succès."
        ]);
        return redirect()->route('Admin-Config-EcoleGetShow');

    }

    public function getEdite(Request $request,Ecole $uuid)
    {

        $data['ecole'] = $uuid;
        $data['secteurs'] = Secteur::where('deleted_by',null)->get();
        return view('page.admin.config.ecole.edite', $data);

    }

    public function postEdite(Request $request,Ecole $uuid)
    {

        $uuid->update($request->all());

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Ecole modifié avec succès."
        ]);
        return redirect()->route('Admin-Config-EcoleGetShow');

    }

}
