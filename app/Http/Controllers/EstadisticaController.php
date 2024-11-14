<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadistica;

class EstadisticaController extends Controller
{
    public function getRecargasPorMes()
    {
        try {
            $recargas = Estadistica::getRecargasPorMes();
            $maxRecarga = Estadistica::getMesMaxRecargas();
            return response()->json(['recargas' => $recargas, 'max_recarga' => $maxRecarga]);
        } catch (\Exception $e) {
            return response()->json([]);
        }
    }

    public function getTotalRecargasPorTipo()
    {
        try {
            $totalRecargas = Estadistica::getTotalRecargasPorTipo();
            return response()->json($totalRecargas);
        } catch (\Exception $e) {
            return response()->json([]);
        }
    }
}
