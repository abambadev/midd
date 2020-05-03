<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ExpirationHostingMail
 * @package App\Mail
 */
class ExpirationDomainReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $last_name;
    public $first_name;
    public $domain_name;
    public $domain_expiration_date;

    /**
     * ExpirationDomainReservationMail constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->last_name = $data['last_name'];
        $this->first_name = $data['first_name'];
        $this->domain_name = $data['domain_name'];
        $this->domain_expiration_date = $data['domain_expiration_date'];
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.username'))
            ->subject(config('app.name').' -  IMPORTANT, Notification d’expiration de votre domaine')
            ->view('mail.expirationDomainReservationMail-html')
            ->text('mail.expirationDomainReservationMail-text');
    }
}
