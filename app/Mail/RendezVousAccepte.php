<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousAccepte extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $rdv;

    public function __construct($user, $rdv)
    {
        $this->user = $user;
        $this->rdv = $rdv;
    }

    public function build()
    {
        return $this->view('emails.rendezVousAccepter');
    }
}
