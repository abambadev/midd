<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ExpirationHostingMail
 * @package App\Mail
 */
class PermutationAuthorHostingOrDomainMail extends Mailable
{
    use Queueable, SerializesModels;

    public $origin_user_last_name;
    public $origin_user_first_name;
    public $recipient_user_last_name;
    public $recipient_user_first_name;
    public $hosting_or_domain_name;
    public $validation_link;

    /**
     * PermutationAuthorHostingOrDomainMail constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->origin_user_last_name = $data['origin_user_last_name'];
        $this->origin_user_first_name = $data['origin_user_first_name'];
        $this->recipient_user_last_name = $data['recipient_user_last_name'];
        $this->recipient_user_first_name = $data['recipient_user_first_name'];
        $this->hosting_or_domain_name = $data['hosting_or_domain_name'];
        $this->validation_link = $data['validation_link'];
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.username'))
            ->subject(config('app.name') . ' - Notification d’information Parrainage')
            ->view('mail.permutationAuthorHostingOrDomainMail-html')
            ->text('mail.permutationAuthorHostingOrDomainMail-text');
    }
}
