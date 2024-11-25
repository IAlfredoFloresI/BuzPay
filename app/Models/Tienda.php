<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;

    protected $table = 'tienda'; // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'idtienda';  // Si el campo es diferente
protected $fillable = ['nombre'];

    // Relación inversa: Una tienda tiene muchos empleados
    public function empleados()
    {
        // Aquí se debe corregir el uso de claves foráneas y locales
        return $this->hasMany(User::class, 'tienda_id', 'idtienda'); // 'tienda_id' es la clave foránea en la tabla `users`
    }
}
