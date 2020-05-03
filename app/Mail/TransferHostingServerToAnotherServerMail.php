<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class ExpirationHostingMail
 * @package App\Mail
 */
class TransferHostingServerToAnotherServerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $last_name;
    public $first_name;
    public $package_name;
    public $recipient_server_name;
    public $origin_server_name;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->last_name = $data['last_name'];
        $this->first_name = $data['first_name'];
        $this->package_name = $data['package_name'];
        $this->recipient_server_name = $data['recipient_server_name'];
        $this->origin_server_name = $data['origin_server_name'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.username'))
            ->subject(config('app.name').' - Notifications de transfert de votre hébergement')
            ->view('mail.transferHostingServerToAnotherServerMail-html')
            ->text('mail.transferHostingServerToAnotherServerMail-text');
    }
}
