<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class RegisterController extends Controller
{
    public function index()
    {
        return view('employees.index'); // Ruta a la vista principal de empleados
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'curp' => 'required|string|max:18',
            'apellidop' => 'required|string|max:255',
            'apellidom' => 'nullable|string|max:255',
            'clasificacion' => 'required|string|max:50',
            'correo_electronico' => 'required|email|max:255',
            'pass' => 'required|string|min:6',
        ]);

        try {
            Empleado::create($validated);
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'curp' => 'required|string|max:18',
            'apellidop' => 'required|string|max:255',
            'apellidom' => 'nullable|string|max:255',
            'clasificacion' => 'required|string|max:50',
            'correo_electronico' => 'required|email|max:255',
            'pass' => 'required|string|min:6',
        ]);

        try {
            $empleado = Empleado::findOrFail($id);
            $empleado->update($validated);
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            Empleado::destroy($id);
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function list_empleados()
    {
        return response()->json(Empleado::orderBy('idusuario', 'DESC')->get());
    }

    public function get_employee($id)
    {
        try {
            $employee = Empleado::findOrFail($id);
            return response()->json($employee);
        } catch (\Exception $e) {
            return response()->json(null, 404);
        }
    }
}
