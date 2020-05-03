<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $_nom;
    public $_prenom;
    public $_reset_url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->_nom = $data['nom'];
        $this->_prenom = $data['prenom'];
        $this->_reset_url = $data['reset_url'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config('app.name') . ' - Mot de passe')
            ->from(config('mail.from.address'), config('mail.from.username'))
            ->view('mail.PasswordResetMail-html')
            ->text('mail.PasswordResetMail-text');
    }
}
