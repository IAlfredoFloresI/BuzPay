<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'idusuario';
    public $timestamps = false;

    protected $fillable = ['nombre', 'curp', 'pass', 'apellidop', 'apellidom', 'clasificacion', 'nombretienda', 'correo_electronico', 'nacimiento'];
}
