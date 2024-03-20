<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSymptomIllnessDisease extends Model
{
    use HasFactory;
    protected $table = 'patient_symptom_illness_disease';
    protected $fillable = ['patient_id', 'symptom_id', 'illness_id', 'disease_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }

    public function illness()
    {
        return $this->belongsTo(Illness::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
