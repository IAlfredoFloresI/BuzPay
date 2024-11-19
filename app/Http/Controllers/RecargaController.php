<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecargaModel;
use Illuminate\Support\Facades\DB;

class RecargaController extends Controller
{
public function obtenerDatosDelCliente($id)
{
    $cliente = DB::table('tarjeta')->where('id', $id)->first();

    if ($cliente) {
        return response()->json([
            'success' => true,
            'idusuario' => $cliente->id, // Asegúrate de que 'idusuario' tiene el valor correcto
            'nombre' => $cliente->nombre, // Agrega más campos si es necesario
        ]);
    } else {
        return response()->json(['success' => false]);
    }
}
    public function realizarRecarga(Request $request)
    {

        
        $request->validate([
            'fecha' => 'required|date',
            'tarjeta' => 'required|exists:tarjeta,id',
            'monto' => 'required|numeric|min:0',
            'usuario' => 'required|integer',
        ]);

        $fecha = $request->input('fecha');
        $tarjetaId = $request->input('tarjeta');
        $monto = $request->input('monto');
        $usuarioId = $request->input('usuario');

        DB::beginTransaction();

        try {
            // Actualizar el saldo de la tarjeta
            $saldoActualizado = RecargaModel::actualizarSaldoTarjeta($tarjetaId, $monto);

            if (!$saldoActualizado) {
                return response()->json(['error' => 'Error al actualizar el saldo de la tarjeta'], 404);
            }

            // Crear un nuevo registro de recarga
            RecargaModel::create([
                'monto' => $monto,
                'fecha' => $fecha,
                'tarjeta' => $tarjetaId,
                'usuario' => $usuarioId,
            ]);

            DB::commit();
            return response()->json(['message' => 'Recarga realizada con éxito'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error al realizar la recarga: ' . $e->getMessage()], 500);
        }
    }

    public function mostrarVista()
    {
        $id = 123; // Esto debe ser el valor real que obtienes para el usuario
        return view('recargarTarjeta', compact('id'));
    }

}
