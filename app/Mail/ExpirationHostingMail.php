<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ExpirationHostingMail
 * @package App\Mail
 */
class ExpirationHostingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $last_name;
    public $first_name;
    public $package_name;
    public $host_expiration_date;
    public $hebergement;

    /**
     * ExpirationHostingMail constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->last_name = $data['last_name'];
        $this->first_name = $data['first_name'];
        $this->host_expiration_date = $data['host_expiration_date'];
        $this->package_name = $data['package_name'];
        $this->hebergement = $data['hebergement'];
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.username'))
            ->subject(config('app.name').' - IMPORTANT, Notification d’expiration de votre hébergement')
            ->view('mail.expirationHostingMail-html')
            ->text('mail.expirationHostingMail-text');
    }
}
