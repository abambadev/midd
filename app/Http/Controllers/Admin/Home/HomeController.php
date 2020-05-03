<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentCreateFormRequest;
use App\Mail\NotificationMail;
use App\Models\AlerteHistorique;
use App\Models\Annonce;
use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Region;
use App\Models\SousCategorie;
use App\Utility\AlerteAnnonce;
use App\Utility\ScrapJumiaDeal;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{

	public function getShow(Request $request)
	{

		return redirect()->route('Admin-ProfilGetShow');

		// $data = [];

		// return view('page.admin.home.show', $data);

	}

}
