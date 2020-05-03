<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationCompteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $_nom;
    public $_prenom;
    public $_activation_url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        $this->_nom = $data['nom'];
        $this->_prenom = $data['prenom'];
        $this->_activation_url = $data['activation_url'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config('app.name').' - Activation de compte')
        ->from(config('mail.from.address'), config('mail.from.username'))
        ->view('mail.ActivationCompteMail-html')
        ->text('mail.ActivationCompteMail-text');
    }
}
