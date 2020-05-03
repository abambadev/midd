<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use App\myClass\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use ReCaptcha\ReCaptcha;

class HomeController extends Controller
{

    public function getShow(Request $request)
    {
        return view('page.site.home.show');
    }

    public function postShow(ContactFormRequest $request)
    {
        // Verification captcha
        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));

        $resp = $recaptcha->setExpectedHostname($request->server('HTTP_HOST'))
            ->setExpectedAction('homepage')
            ->setScoreThreshold(0.5)
            ->verify($request->recaptcha, $request->ip());

        if (!$resp->isSuccess()) {
            Flasher::error("Impossible de soumettre votre formulaire");
            return redirect()->route('Site-HomeGetShow');
        }

        // Envoi de notification
        try {
            Mail::send(new ContactMail($request->all()));
        } catch (\Exception $e) {
        }

        Flasher::success("Message envoyé.");

        return redirect()->back();
    }
}
