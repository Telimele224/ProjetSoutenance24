<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaires extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'id_medecin',
        'lundi_debut', 'lundi_fin',
        'mardi_debut', 'mardi_fin',
        'mercredi_debut', 'mercredi_fin',
        'jeudi_debut', 'jeudi_fin',
        'vendredi_debut', 'vendredi_fin',
        'samedi_debut', 'samedi_fin',
        'dimanche_debut', 'dimanche_fin',
    ];

    protected $primaryKey = 'id';

    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'id_medecin');
    }
}