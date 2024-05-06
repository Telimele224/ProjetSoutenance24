<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'motif',
        'resultat',
        'examen_complementaire',
        'suivi_recommande',
        'note_medecin',
        'frais',
        'status',
        'rdv_id',
        'type_consultation_id',
    ];

    public function rdv()
    {
        return $this->belongsTo(Rdv::class, 'rdv_id');
    }

    public function typeConsultation()
    {
        return $this->belongsTo(TypeConsultation::class, 'type_consultation_id');
    }

    public function ordonance()
    {
        return $this->hasMany(Ordonance::class);
    }
}
