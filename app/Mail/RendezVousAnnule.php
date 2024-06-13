<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousAnnule extends Mailable
{
    use Queueable, SerializesModels;

    public $patientUser;
    public $rendezVous;

    public function __construct($patientUser, $rendezVous)
    {
        $this->patientUser = $patientUser;
        $this->rendezVous = $rendezVous;
    }

    public function build()
    {
        return $this->view('emails.rendezVousAnnuler')
                    ->with([
                        'patientUser' => $this->patientUser,
                        'rendezVous' => $this->rendezVous,
                    ]);
    }
}

