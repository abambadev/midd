<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class NewHostingMail
 * @package App\Mail
 */
class NewHostingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $last_name;
    public $first_name;
    public $panel_username;
    public $panel_password;
    public $panel_link;
    public $params_host;
    public $host_expiration_date;

    /**
     * NewHostingMail constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->last_name = $data['last_name'];
        $this->first_name = $data['first_name'];
        $this->panel_username = $data['panel_username'];
        $this->panel_password = $data['panel_password'];
        $this->panel_link = $data['panel_link'];
        $this->params_host = $data['params_host'];
        $this->host_expiration_date = $data['host_expiration_date'];
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.username'))
        ->subject(config('app.name').' - Création de votre hébergement')
        ->view('mail.newHostingMail-html')
        ->text('mail.newHostingMail-text');
    }
}
