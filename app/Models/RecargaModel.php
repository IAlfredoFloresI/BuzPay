<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RecargaModel extends Model
{
    protected $table = 'recarga'; // Nombre de la tabla en la base de datos
    public $timestamps = false;

    protected $fillable = [
        'monto',
        'fecha',
        'tarjeta',
        'usuario',
    ];

    // Método para actualizar el saldo de la tarjeta
    public static function actualizarSaldoTarjeta($tarjetaId, $monto)
    {
        return DB::table('tarjeta')
            ->where('ID', $tarjetaId)
            ->increment('saldoTotal', $monto);
    }
}
