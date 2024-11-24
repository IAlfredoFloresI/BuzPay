<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recarga extends Model
{
    use HasFactory;

    protected $table = 'recarga';
    protected $primaryKey = 'idrecarga'; // Clave primaria personalizada
    public $incrementing = true; // Indica que es autoincremental
    protected $keyType = 'int';
    protected $fillable = ['monto', 'fecha', 'tarjeta_id', 'usuario_id'];

    public function tarjeta()
    {
        return $this->belongsTo(Tarjeta::class, 'tarjeta_id');
    }
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    
}