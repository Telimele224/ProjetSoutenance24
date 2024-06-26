<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];


    public $timestamps = false; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

