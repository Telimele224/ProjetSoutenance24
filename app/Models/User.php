<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nom',
        'prenom',
        'genre',
        'adresse',
        'age',
        'telephone',
        'avatar',
        'email',
        'password',
        'role',
        'statut',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function administrateurs()
    {
        return $this->hasOne(Administrateurs::class);
    }
    public function medecin()
    {
        return $this->hasOne(Medecin::class);
    }
    // Définissez la relation avec le modèle Rdv
    public function rdvs()
    {
        return $this->hasMany(Rdv::class, 'id_medecin');
    }
    public function patients()
    {
        return $this->hasMany(Patient::class, 'user_id');
    }

}
