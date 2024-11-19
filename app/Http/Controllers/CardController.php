<?php

namespace App\Http\Controllers;

use App\Models\CardModel;
use Illuminate\Http\Request;

class CardController extends Controller
{
    // Muestra la vista principal
    public function index()
    {
        return view('admin.card');
    }

    // Devuelve la vista 'admin.card'
    public function show()
    {
        return view('admin.card');
    }

    // Consulta el saldo de la tarjeta usando el ID
    public function getCardDetails(Request $request)
{
    $id = $request->input('id');

    try {
        // Consulta ambas columnas en una sola consulta
        $cardDetails = CardModel::select('saldototal', 'vencitarjeta')->findOrFail($id);
        return response()->json($cardDetails);
    } catch (\Exception $e) {
        return response()->json(['error' => 'No se encontró una tarjeta con el ID: ' . $id], 404);
    }
}

}
