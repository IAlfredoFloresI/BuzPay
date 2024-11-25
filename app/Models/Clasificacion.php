<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Clasificacion extends Model
{
    protected $table = 'clasificacion';
    protected $primaryKey = 'idclasif';
    public $timestamps = false;


    // Relación en User.php
    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'clasificacion', 'idclasif');
    }
}

// Uso en AdminController
$tipoUsuario = Auth::user()->clasificacion->nombre ?? 'Usuario';
