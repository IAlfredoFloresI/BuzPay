<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Mostrar la vista con empleados (clasificación 2) y clientes (clasificación 3)
    public function list(Request $request)
    {
        $store = $request->query('store');

        // Obtener empleados
        $employees = User::where('clasificacion', 2)->get(); // Filtrar clasificacion = 2 para empleados

        // Obtener clientes
        if ($store === 'all') {
            $clients = User::where('clasificacion', 3)->get(); // Filtrar clasificacion = 3 para clientes
        } else {
            // Si necesitas otra lógica para filtrar según "store"
            $clients = User::where('clasificacion', 3)
                ->where('store', $store) // Ejemplo: filtro adicional
                ->get();
        }

        // Devolver ambos grupos en una respuesta JSON
        return response()->json([
            'employees' => $employees,
            'clients' => $clients,
        ]);
    }


    // Para ascender un empleado
    public function promoteEmployee($id)
    {
        $employee = User::findOrFail($id);
        $employee->clasificacion = 1; // Ascender al empleado (clasificacion 1)
        $employee->save();

        return response()->json(['message' => 'Empleado ascendido correctamente.']);
    }

    // Para despedir un empleado
    public function fireEmployee($id)
    {
        $employee = User::findOrFail($id);
        $employee->clasificacion = 3; // Cambiar a clasificacion 3 (despedido)
        $employee->save();

        return response()->json(['message' => 'Empleado despedido correctamente.']);
    }

    // Para contratar un cliente (cambiar su clasificacion a 2)
    public function hireClient($id)
    {
        $client = User::findOrFail($id);
        $client->clasificacion = 2; // Cambiar a clasificacion 2 (contratado)
        $client->save();

        return response()->json(['message' => 'Cliente contratado correctamente.']);
    }
}
