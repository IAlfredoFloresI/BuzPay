<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'usuario';  // Nombre de la tabla que corresponde en la base de datos
    protected $primaryKey = 'idusuario';  // Define la clave primaria si no es la 'id'
    public $timestamps = false;  // Si no usas los campos created_at y updated_at en la tabla

    protected $fillable = [
        'nombre', 'curp', 'pass', 'apellidop', 'apellidom', 'clasificacion', 
        'nombretienda', 'correo_electronico', 'nacimiento'
    ];
}
