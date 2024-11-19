<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recarga extends Model {
    use HasFactory;

    protected $table = 'recarga';
    protected $primaryKey = 'idrecarga';
    public $timestamps = false;

    protected $fillable = ['monto', 'fecha', 'tarjeta', 'usuario'];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuars', 'id');
    }
}
