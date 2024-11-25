<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadistica;
use Illuminate\Support\Facades\Log;

class EstadisticaController extends Controller
{
    public function getRecargasPorMes()
    {
        try {
            Log::info('Recargando estadísticas por mes...');
            $recarga = Estadistica::getRecargasPorMes();
            $maxRecarga = Estadistica::getMesMaxRecargas();
            Log::info('Recarga y max recarga obtenidos exitosamente.');
            return response()->json(['recarga' => $recarga, 'max_recarga' => $maxRecarga]);
        } catch (\Exception $e) {
            Log::error('Error en getRecargasPorMes: ' . $e->getMessage());
            return response()->json([]);
        }
    }

    public function getTotalRecargasPorTipo()
    {
        try {
            Log::info('Obteniendo total de recargas por tipo...');
            $totalRecargas = Estadistica::getTotalRecargasPorTipo();
            Log::info('Total de recargas por tipo: ' . json_encode($totalRecargas)); // Registra los datos obtenidos
            return response()->json($totalRecargas);
        } catch (\Exception $e) {
            Log::error('Error en getTotalRecargasPorTipo: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

