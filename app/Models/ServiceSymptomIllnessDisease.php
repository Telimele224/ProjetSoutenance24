<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSymptomIllnessDisease extends Model
{
    use HasFactory;
    protected $table = 'service_symptom_illness_disease'; 

    protected $fillable = ['service_id', 'symptom_id', 'illness_id', 'disease_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
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
