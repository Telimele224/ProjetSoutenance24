<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'medecin_id',
        'patient_id',
        'type_consultation_id',
        'motif',
        'resultat',
        'examen_complementaire',
        'suivi_recommande',
        'note_medecin',
        'frais',
        'status',
        'code',
    ];

    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'medecin_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function typeConsultation()
    {
        return $this->belongsTo(TypeConsultation::class, 'type_consultation_id');
    }
}
