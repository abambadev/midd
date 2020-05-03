<?php

namespace App\Http\Controllers\Admin\Config\Role;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\myClass\AlphaIncrement;
use App\myClass\Flasher;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    public function getShow(Request $request)
    {

        // dd(Auth::user()->getParrain);

        $data['roles'] = Role::get();

        return view('page.admin.config.role.show', $data);

    }

    public function getCreate(Request $request)
    {

        // $user = User::where('id', 2)->first();
        // $user->attachRole(4);

        // $permission = new Permission();
        // $permission->name         = 'config-support-synchro';
        // $permission->display_name = 'Synchro support';
        // $permission->description  = "Synchro support";
        // $permission->save();



        // $permission = new Permission();
        // $permission->name         = 'config-support-show';
        // $permission->display_name = 'Show support';
        // $permission->description  = "Show support";
        // $permission->save();

        // $permission = new Permission();
        // $permission->name         = 'config-support-etat';
        // $permission->display_name = 'Etat support';
        // $permission->description  = "Etat support";
        // $permission->save();

        // $permission = new Permission();
        // $permission->name         = 'config-support-detail';
        // $permission->display_name = 'Detail support';
        // $permission->description  = "Detail support";
        // $permission->save();

        // $permission = new Permission();
        // $permission->name         = 'config-support-create';
        // $permission->display_name = 'Create support';
        // $permission->description  = "Creer des support";
        // $permission->save();

        // $permission = new Permission();
        // $permission->name         = 'config-support-edite';
        // $permission->display_name = 'Edite support';
        // $permission->description  = "Modifier des support";
        // $permission->save();

        // $permission = new Permission();
        // $permission->name         = 'config-support-delete';
        // $permission->display_name = 'Delete support';
        // $permission->description  = "Supprimer support";
        // $permission->save();


        $data['permission'] = Permission::get();
        return view('page.admin.config.role.create', $data);

    }

    public function postCreate(Request $request)
    {

        $role = new Role();
        $role->name = str_slug($request->name);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        $role->attachPermission($request->permission);

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Rôle ajouté avec succès."
        ]);
        return redirect()->route('Admin-Config-RoleGetShow');

    }

    public function getDelete(Request $request, $id)
    {

        $data['role'] = Role::findOrFail($id);
        return view('page.admin.config.role.delete', $data);

    }

    public function postDelete(Request $request, $id)
    {

        $role = Role::findOrFail($id);

        $role->users()->sync([]);
        $role->perms()->sync([]);
        $role->delete();

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Rôle supprimé avec succès."
        ]);
        return redirect()->route('Admin-Config-RoleGetShow');

    }

    public function getEdite(Request $request, $id)
    {

        $data['role'] = Role::findOrFail($id);
        $data['permission'] = Permission::get();
        return view('page.admin.config.role.edite', $data);

    }

    public function postEdite(Request $request, $id)
    {

        $role = Role::findOrFail($id);
        $role->update([
            'name' => str_slug($request->name),
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        $role->perms()->sync([]);
        $role->attachPermission($request->permission);

        $request->session()->flash('MsgFlash', [
            'type' => "success",
            'msg' => "Rôle modifié avec succès."
        ]);
        return redirect()->route('Admin-Config-RoleGetShow');

    }

}
