<?php

namespace App\Http\Controllers\Admin\WebService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Extension;
use App\myClass\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WebServiceController extends Controller
{
    public function getShow()
    {

        return view('page.admin.webservice.show');
    }

    public function postShow()
    {
        $key = Str::uuid();
        Auth::user()->update(
            [
                'uuid' => $key,
            ]
        );
        Flasher::success("Votre API_KEY a été modifié. Nouveau API_KEY : " . $key);
        return redirect()->back();
    }
}
