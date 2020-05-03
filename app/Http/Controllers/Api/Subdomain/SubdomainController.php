<?php

namespace App\Http\Controllers\Api\Subdomain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\myClass\WebServiceApi;

class SubdomainController extends Controller
{
    public function postList(Request $request, $version)
    {
        $WebServiceApi = new WebServiceApi($version, $request->api_key, $request->email);

        if ($WebServiceApi->auth()['statu'] == false) {
            return $WebServiceApi->response($WebServiceApi->auth()['code']);
        }

        return $WebServiceApi->SubdomainList($request->user);
    }

    public function postCreate(Request $request, $version)
    {
        $WebServiceApi = new WebServiceApi($version, $request->api_key, $request->email);

        if ($WebServiceApi->auth()['statu'] == false) {
            return $WebServiceApi->response($WebServiceApi->auth()['code']);
        }

        return $WebServiceApi->SubdomainCreate($request->user, $request->name, $request->path);
    }

    public function postDelete(Request $request, $version)
    {
        $WebServiceApi = new WebServiceApi($version, $request->api_key, $request->email);

        if ($WebServiceApi->auth()['statu'] == false) {
            return $WebServiceApi->response($WebServiceApi->auth()['code']);
        }

        return $WebServiceApi->SubdomainDelete($request->user, $request->name);
    }
}
