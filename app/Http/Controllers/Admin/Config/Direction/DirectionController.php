<?php

namespace App\Http\Controllers\Admin\Config\Direction;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirectionFormRequest;
use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DirectionController extends Controller
{

    public function getShow(Request $request)
    {
        $data['directions'] = Direction::all();
        return view('page.admin.config.direction.show', $data);

    }

    public function getCreate(Request $request)
    {
        $data['drens'] = [];
        return view('page.admin.config.direction.create',$data);

    }

    public function postCreate(DirectionFormRequest $request)
    {
        try {

            $direction = Direction::create([
                'uuid' => (string)Str::uuid(),
                'libelle' => $request->libelle
            ]);

            $request->session()->flash('MsgFlash', [
                'type' => "success",
                'msg' => "Direction ajouté avec succès."
            ]);
        } catch (\Exception $e) {
            $request->session()->flash('MsgFlash', [
                'type' => "Error",
                'msg' => "Une erreur est survenue lors de l'enregistrement."
            ]);

            dd($e->getMessage());
        }

        return redirect()->route('Admin-Config-DirectionGetShow');

    }

    public function getDelete(Request $request,Direction $uuid)
    {

        $data['direction'] = $uuid;
        return view('page.admin.config.direction.delete', $data);

    }

    public function postDelete(Request $request, Direction $uuid)
    {
        $uuid->delete();
        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Direction supprimé avec succès."
        ]);
        return redirect()->route('Admin-Config-DirectionGetShow');

    }

    public function getEdite(Request $request,Direction $uuid)
    {

        $data['direction'] = $uuid;
        return view('page.admin.config.direction.edite', $data);

    }

    public function postEdite(Request $request,Direction $uuid)
    {
        //dd($request);
        $uuid->update($request->all());

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Direction modifié avec succès."
        ]);
        return redirect()->route('Admin-Config-DirectionGetShow');

    }

}
