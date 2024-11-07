<?php

namespace App\Http\Controllers;

use App\Models\CardModel;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return view('admin.card');
    }

    public function show()
{
    return view('admin.card');
}


    public function getCardDetails(Request $request)
    {
        $id = $request->input('id');

        try {
            $cardDetails = CardModel::select('saldototal', 'vencitarjeta')->findOrFail($id);
            return response()->json($cardDetails);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No card found with ID: ' . $id], 404);
        }
    }
}
