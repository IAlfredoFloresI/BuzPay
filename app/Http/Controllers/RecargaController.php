<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecargaController extends Controller
{
    public function obtenerDatosDelCliente($id)
    {
        $cliente = DB::table('tarjeta')->where('id', $id)->first();

        if ($cliente) {
            return response()->json([
                'success' => true,
                'idusuario' => $cliente->id,
                'nombre' => $cliente->nombre,
            ]);
        }

        return response()->json(['success' => false, 'error' => 'Cliente no encontrado.']);
    }

    public function realizarRecarga(Request $request)
    {
        $request->validate([
            'tarjeta' => 'required|exists:tarjeta,id',
            'monto' => 'required|numeric|min:0',
        ]);

        $tarjetaId = $request->input('tarjeta');
        $monto = $request->input('monto');

        DB::beginTransaction();

        try {
            // Obtener saldo actual
            $tarjeta = DB::table('tarjeta')->where('id', $tarjetaId)->first();
            if (!$tarjeta) {
                return response()->json(['success' => false, 'error' => 'Tarjeta no encontrada.']);
            }

            // Actualizar saldo
            $nuevoSaldo = $tarjeta->saldo + $monto;
            DB::table('tarjeta')->where('id', $tarjetaId)->update(['saldo' => $nuevoSaldo]);

            // Registrar recarga (opcional)
            DB::table('recargas')->insert([
                'tarjeta_id' => $tarjetaId,
                'monto' => $monto,
                'fecha' => now(),
            ]);

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Recarga realizada con éxito.', 'nuevo_saldo' => $nuevoSaldo]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => 'Error al realizar la recarga: ' . $e->getMessage()]);
        }
    }
}
