<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ExpirationHostingMail
 * @package App\Mail
 */
class SponsorshipUseTokenRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $last_name;
    public $first_name;
    public $goddaughter_count_up;

    /**
     * SponsorshipUseTokenRegisterMail constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->last_name = $data['last_name'];
        $this->first_name = $data['first_name'];
        $this->goddaughter_count_up = $data['goddaughter_count_up'];
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.username'))
            ->subject(config('app.name').' -  Notification d’information Parrainage')
            ->view('mail.sponsorshipUseTokenRegisterMail-html')
            ->text('mail.sponsorshipUseTokenRegisterMail-text');
    }
}
