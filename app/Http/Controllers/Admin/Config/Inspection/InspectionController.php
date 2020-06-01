<?php

namespace App\Http\Controllers\Admin\Config\Inspection;

use App\Http\Controllers\Controller;
use App\Http\Requests\InspectionFormRequest;
use App\Models\Direction;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InspectionController extends Controller
{

    public function getShow(Request $request)
    {
        $data['inspections'] = Inspection::join('directions','directions.id','inspections.dren_id')
                                    ->select('inspections.*','directions.libelle as dren')->get();
        return view('page.admin.config.inspection.show', $data);

    }

    public function getCreate(Request $request)
    {
        $data['drens'] = [];
        $data['directions'] = Direction::where('deleted_by',null)->get();
        return view('page.admin.config.inspection.create',$data);

    }

    public function postCreate(InspectionFormRequest $request)
    {
        try {

            $inspection = Inspection::create([
                'uuid' => (string)Str::uuid(),
                'dren_id' => $request->dren_id,
                'libelle' => $request->libelle
            ]);

            $request->session()->flash('MsgFlash', [
                'type' => "success",
                'msg' => "Inspection ajouté avec succès."
            ]);
        } catch (\Exception $e) {
            $request->session()->flash('MsgFlash', [
                'type' => "Error",
                'msg' => "Une erreur est survenue lors de l'enregistrement."
            ]);

            dd($e->getMessage());
        }

        return redirect()->route('Admin-Config-InspectionGetShow');

    }

    public function getDelete(Request $request,Inspection $uuid)
    {

        $data['inspection'] = $uuid;
        return view('page.admin.config.inspection.delete', $data);

    }

    public function postDelete(Request $request, Inspection $uuid)
    {
        $uuid->delete();
        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Inspection supprimé avec succès."
        ]);
        return redirect()->route('Admin-Config-InspectionGetShow');

    }

    public function getEdite(Request $request,Inspection $uuid)
    {

        $data['inspection'] = $uuid;
        $data['directions'] = Direction::where('deleted_by',null)->get();
        return view('page.admin.config.inspection.edite', $data);

    }

    public function postEdite(Request $request,Inspection $uuid)
    {
        //dd($request);
        $uuid->update($request->all());

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Inspection modifié avec succès."
        ]);
        return redirect()->route('Admin-Config-InspectionGetShow');

    }

}
