<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recarga;
use App\Models\Usuario;
use Carbon\Carbon;


class CierreCajaController extends Controller {

    public function index()
    {
        return view('Cierre_Caja.index');  // Asegúrate de que la vista esté en la carpeta correcta
    }
    
    public function getRecargasDia(Request $request) {
        $fecha = $request->input('fecha', Carbon::today()->toDateString());
        $recargas = Recarga::with('usuario')
            ->where('fecha', $fecha)
            ->get(['monto', 'fecha', 'usuario']);

        return response()->json($recargas);
    }

    public function getTotalRecargasDia(Request $request) {
        $fecha = $request->input('fecha', Carbon::today()->toDateString());
        $total = Recarga::where('fecha', $fecha)->sum('monto');

        return response()->json(['total' => $total]);
    }

    public function getFechasRecargas() {
        $fechas = Recarga::select('fecha')->distinct()->orderBy('fecha', 'desc')->get();

        return response()->json($fechas);
    }
}
