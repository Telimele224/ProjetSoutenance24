<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'ville',
        'poids',
        'telephone',
        'user_id'
    ];
    //Pour recuper l'image des user qui a publier le temoignage
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function patient()
    // {
    //     return $this->belongsTo(Patient::class);
    // }

    public function rdvs() {
        return $this->hasMany(Rdv::class);
    }


    public function temoignages()
    {
        return $this->hasMany(Temoignage::class);
    }

    public function consultations() {
        $this->hasMany(Consultation::class);
    }

    
}
