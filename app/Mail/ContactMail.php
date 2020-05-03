<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $_name;
    public $_email;
    public $_phone;
    public $_msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->_name = $data['name'];
        $this->_email = $data['email'];
        $this->_phone = $data['phone'];
        $this->_msg = $data['msg'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(config('mail.from.address'), config('mail.from.username'))
            ->from($this->_email, $this->_name)
            ->subject(config('app.name') . ' - Contact')
            ->view('mail.ContactMail-html')
            ->text('mail.ContactMail-text');
    }
}
