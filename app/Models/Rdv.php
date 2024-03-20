<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;
    protected $fillable = ['id_patient','id_medecin','dateRdv','heure','jour','statut'];

    public function patient(){
        return $this->belongsTo(Patient::class,'id_patient');
    }

     public function medecin(){
        return $this->belongsTo(Medecin::class,'id_medecin');
    }
}
