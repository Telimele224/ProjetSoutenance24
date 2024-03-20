<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'statut',
        'specialite',
        'biographie',
        'service_id',
        'user_id'
    ];

    public function horaires()
    {
        return $this->hasOne(Horaires::class, 'id_medecin');
    }

    public function rdvs() {
        return $this->hasMany(Rdv::class, 'id_medecin');
    }



    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
