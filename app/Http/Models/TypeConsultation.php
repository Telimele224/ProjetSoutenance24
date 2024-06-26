<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeConsultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function consultations() {
        $this->hasMany(Consultation::class);
    }
}
