<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardModel extends Model
{
    protected $table = 'tarjeta';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tipo', 'nombre', 'apellidop', 'apellidom', 'curp',
        'claveelector', 'folioinapam', 'foliodif', 'vencitarjeta', 'saldototal'
    ];
}
