<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $_nom;
    public $_prenom;
    public $_msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        $this->_nom = $data['nom'];
        $this->_prenom = $data['prenom'];
        $this->_msg = $data['msg'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config('app.name') . ' - Notification')
            ->from(config('mail.from.address'), config('mail.from.username'))
            ->view('mail.NotificationMail-html')
            ->text('mail.NotificationMail-text');
    }
}
