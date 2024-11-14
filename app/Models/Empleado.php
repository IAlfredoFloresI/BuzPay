<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'usuario'; // Mantenemos la tabla `usuario`

    protected $primaryKey = 'idusuario';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'curp',
        'pass',
        'apellidop',
        'apellidom',
        'clasificacion',
        'nombreTienda',
        'correo_electronico',
        'nacimiento',
    ];
}
