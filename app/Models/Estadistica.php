<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Estadistica
{
    public static function getRecargasPorMes()
    {
        Log::info('Ejecutando consulta: getRecargasPorMes');
        return DB::table('recarga')
            ->select(DB::raw('EXTRACT(MONTH FROM fecha) as mes, SUM(monto) as total'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
    }

    public static function getMesMaxRecargas()
    {
        Log::info('Ejecutando consulta: getMesMaxRecargas');
        return DB::table('recarga')
            ->select(DB::raw('EXTRACT(MONTH FROM fecha) as mes, SUM(monto) as total'))
            ->groupBy('mes')
            ->orderByDesc('total')
            ->first();
    }

    public static function getTotalRecargasPorTipo()
    {
        Log::info('Ejecutando consulta: getTotalRecargasPorTipo');
        return DB::table('recarga')
            ->join('tarjeta', 'recarga.tarjeta_id', '=', 'tarjeta.id')
            ->join('tipotarjeta', 'tarjeta.tipo', '=', 'tipotarjeta.idtipo')
            ->select('tipotarjeta.tipo as Tipo_de_Tarjeta', DB::raw('COUNT(*) as total_de_Recargas'))
            ->groupBy('tipotarjeta.tipo')
            ->get();
    }
}
