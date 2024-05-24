<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $primaryKey = 'service_id';
    protected $fillable = [
        'photo',
        'nom',
        'description',
        'avatar'
    ];

    public function medecin(){
        return $this->hasMany(Medecin::class,'service_id');
    }
    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class, 'service_symptom_illness_disease', 'service_id', 'symptom_id');
    }

    public function illnesses()
    {
        return $this->belongsToMany(Illness::class, 'service_symptom_illness_disease', 'service_id', 'illness_id');
    }

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'service_symptom_illness_disease', 'service_id', 'disease_id');
    }
}
