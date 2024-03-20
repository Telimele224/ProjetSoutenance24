<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousAnnule extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $rdv;
    public $raisonAnnulation;

    public function __construct($user, $rdv, $raisonAnnulation)
    {
        $this->user = $user;
        $this->rdv = $rdv;
        $this->raisonAnnulation = $raisonAnnulation;
    }

    public function build()
    {
        return $this->view('emails.rendezVousAnnuler');
    }
}
