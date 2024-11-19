<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'users';
    
    // Laravel maneja automáticamente la columna "id" como clave primaria
    protected $fillable = [
        'curp',
        'nacimiento',
        'clasificacion',
        'tienda',
        'name',
        'email',
        'password',
    ];
}
