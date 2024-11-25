<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recarga; // Modelo de la tabla recargas
use App\Models\User; // Modelo de usuarios (si es necesario)

class CierreCajaController extends Controller
{
    public function index()
    {
        return view('Cierre_Caja.index');  // Asegúrate de que la vista esté en la carpeta correcta
    }
    public function getRecargasDia(Request $request)
    {
        $fecha = $request->input('fecha');
        $recargas = Recarga::whereDate('fecha', $fecha)->with('usuario')->get();
    
        return response()->json($recargas);
    }
    
    

    public function getFechasRecargas()
    {
        $fechas = Recarga::selectRaw('DATE(fecha) as fecha')
            ->distinct()
            ->orderBy('fecha', 'desc')
            ->get();

        return response()->json($fechas);
    }

    public function getTotalRecargasDia(Request $request)
    {
        $fecha = $request->input('fecha');
        $total = Recarga::whereDate('fecha', $fecha)->sum('monto');

        return response()->json(['total' => $total]);
    }
}
