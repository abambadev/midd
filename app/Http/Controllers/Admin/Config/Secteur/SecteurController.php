<?php

namespace App\Http\Controllers\Admin\Config\Secteur;

use App\Http\Controllers\Controller;
use App\Http\Requests\SecteurFormRequest;
use App\Models\Secteur;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SecteurController extends Controller
{

    public function getShow(Request $request)
    {
        $data['secteurs'] = Secteur::join('inspections','inspections.id','secteurs.iep_id')
                                ->select('secteurs.*','inspections.libelle as iep')->get();
        return view('page.admin.config.secteur.show', $data);

    }

    public function getCreate(Request $request)
    {
        $data['inspections'] = Inspection::where('deleted_by',null)->get();

        return view('page.admin.config.secteur.create',$data);

    }

    public function postCreate(SecteurFormRequest $request)
    {
        try {

            $secteur = Secteur::create([
                'uuid' => (string)Str::uuid(),
                'libelle' => $request->libelle,
                'iep_id' => $request->iep_id
            ]);

            $request->session()->flash('MsgFlash', [
                'type' => "success",
                'msg' => "Secteur ajouté avec succès."
            ]);
        } catch (\Exception $e) {

            $request->session()->flash('MsgFlash', [
                'type' => "Error",
                'msg' => "Une erreur est survenue lors de l'enregistrement."
            ]);

        }

        return redirect()->route('Admin-Config-SecteurGetShow');

    }

    public function getDelete(Request $request,Secteur $uuid)
    {

        $data['secteur'] = $uuid;
        return view('page.admin.config.secteur.delete', $data);

    }

    public function postDelete(Request $request,Secteur $uuid)
    {

        $uuid->delete();

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Secteur supprimé avec succès."
        ]);
        return redirect()->route('Admin-Config-SecteurGetShow');

    }

    public function getEdite(Request $request,Secteur $uuid)
    {

        $data['secteur'] = $uuid;
        $data['inspections'] = Inspection::where('deleted_by',null)->get();
        return view('page.admin.config.secteur.edite', $data);

    }

    public function postEdite(Request $request,Secteur $uuid)
    {

        $uuid->update($request->all());

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Secteur modifié avec succès."
        ]);
        return redirect()->route('Admin-Config-SecteurGetShow');

    }

}
