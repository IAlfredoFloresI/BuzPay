<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    public static function getRecargasPorMes()
    {
        return DB::table('recarga')
            ->select(DB::raw('DATE_FORMAT(fecha, "%Y-%m") as mes'), DB::raw('COUNT(*) as num_recargas'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
    }

    public static function getMesMaxRecargas()
    {
        return DB::table('recarga')
            ->select(DB::raw('DATE_FORMAT(fecha, "%Y-%m") as mes'), DB::raw('COUNT(*) as num_recargas'))
            ->groupBy('mes')
            ->orderByDesc('num_recargas')
            ->limit(1)
            ->first();
    }

    public static function getTotalRecargasPorTipo()
    {
        return DB::table('tipotarjeta as tt')
            ->leftJoin('tarjeta as t', 'tt.idtipo', '=', 't.tipo')
            ->leftJoin('recarga as r', 't.id', '=', 'r.tarjeta')
            ->select('tt.tipo as Tipo_de_Tarjeta', DB::raw('COALESCE(SUM(r.monto), 0) as Total_de_Recargas'))
            ->where('tt.tipo', '!=', 'Discapacitado')
            ->groupBy('tt.tipo')
            ->get();
    }
}
