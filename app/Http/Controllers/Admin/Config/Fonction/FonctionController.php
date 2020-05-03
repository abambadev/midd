<?php

namespace App\Http\Controllers\Admin\Config\Fonction;

use App\Http\Controllers\Controller;
use App\Http\Requests\FonctionFormRequest;
use App\Models\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FonctionController extends Controller
{

    public function getShow(Request $request)
    {
        $data['fonctions'] = Fonction::all();
        return view('page.admin.config.fonction.show', $data);

    }

    public function getCreate(Request $request)
    {

        return view('page.admin.config.fonction.create');

    }

    public function postCreate(FonctionFormRequest $request)
    {
        try {

            $fonction = Fonction::create([
                'uuid' => (string)Str::uuid(),
                'libelle' => $request->libelle
            ]);

            $request->session()->flash('MsgFlash', [
                'type' => "success",
                'msg' => "Fonction ajouté avec succès."
            ]);
        } catch (\Exception $e) {
            $request->session()->flash('MsgFlash', [
                'type' => "Error",
                'msg' => "Une erreur est survenue lors de l'enregistrement."
            ]);

            dd($e->getMessage());
        }

        return redirect()->route('Admin-Config-FonctionGetShow');

    }

    public function getDelete(Request $request, $id)
    {

        $data['fonction'] = Fonction::findOrFail($id);
        return view('page.admin.config.fonction.delete', $data);

    }

    public function postDelete(Request $request, $id)
    {

        $role = Fonction::findOrFail($id);

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Fonction supprimé avec succès."
        ]);
        return redirect()->route('Admin-Config-FonctionGetShow');

    }

    public function getEdite(Request $request, $id)
    {

        $data['fonction'] = Fonction::findOrFail($id);
        return view('page.admin.config.fonction.edite', $data);

    }

    public function postEdite(Request $request, $id)
    {

        $fonction = Fonction::findOrFail($id);

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Fonction modifié avec succès."
        ]);
        return redirect()->route('Admin-Config-FonctionGetShow');

    }

}
