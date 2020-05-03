<?php

namespace App\Http\Controllers\Site\Logout;

use App\Http\Controllers\Controller;
use App\Models\LoginSession;
use Browser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
	public function getShow(Request $request)
	{

		$ip = $request->server('HTTP_X_FORWARDED_FOR');
		$ip_check = LoginSession::where('ip',$ip)->first();

		if ( $ip_check <> null ) {
			$pays_code = $ip_check->pays_code;
			$pays_name = $ip_check->pays_name;
			$ville = $ip_check->ville;
		} else {
			$ip_check = json_decode(file_get_contents('http://ip-api.com/json/'.$ip.'?lang=fr'));
			$pays_code = $ip_check->countryCode ? $ip_check->countryCode : null;
			$pays_name = $ip_check->country ? $ip_check->country : null;
			$ville = $ip_check->city ? $ip_check->city : null;
		}

		LoginSession::create([
			'users_id' => Auth::id(),
			'ip' => $request->ip(),
			'pays_code' => $pays_code,
			'pays_name' => $pays_name,
			'ville' => $ville,
			'appareil' => Browser::deviceFamily().' - '.Browser::deviceModel(),
			'os' => Browser::platformName(),
			'navigateur' => Browser::browserName(),
			'action' => 'Déconnexion',
			'user_agent' => $request->server('HTTP_USER_AGENT'),
		]);

		Auth::logout();
		return redirect()->route('Site-HomeGetShow');
	}
}
