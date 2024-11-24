<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $table = 'tarjeta';
    protected $fillable = ['tipo', 'nombre', 'apellidop', 'apellidom', 'curp', 'claveelector', 'folioinapam', 'foliodif', 'vencitarjeta', 'saldototal'];

    
    public function recargas()
{
    return $this->hasMany(Recarga::class, 'tarjeta_id');
}
}
