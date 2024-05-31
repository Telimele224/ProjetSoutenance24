<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonance extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'name',
        'posologie',
        'mode_utilisation',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
    // protected $casts = [
    //     'name' => 'array',
    //     'posologie' => 'array',
    //     'modes_utilisation' => 'array',
    // ];

}


