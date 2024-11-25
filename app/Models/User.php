<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, HasProfilePhoto, HasTeams, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'curp',
        'nacimiento',
        'email',
        'password',
        'face_descriptor',
        'clasificacion',
        'tienda',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // Relación: Un usuario pertenece a una tienda
    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'tienda', 'idtienda');
    }

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class);
    }

    // Relación: Un usuario pertenece a una clasificación
    public function clasificacion1()
    {
        return $this->belongsTo(Clasificacion::class, 'clasificacion', 'idclasif'); // Relaciona con la tabla `clasificacion` y la columna `clasificacion`
    }
}
