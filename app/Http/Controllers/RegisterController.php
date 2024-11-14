<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado; // Cambiado a Empleado

class RegisterController extends Controller
{

    public function index()
{
    return view('employees.index'); // Ruta a la vista de administración de usuarios
}

    public function register(Request $request)
    {
        $data = $request->only([
            'nombre',
            'curp',
            'apellidop',
            'apellidom',
            'clasificacion',
            'correo_electronico',
            'pass',
        ]);

        try {
            Empleado::create($data); // Cambiado a Empleado
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'nombre',
            'curp',
            'apellidop',
            'apellidom',
            'clasificacion',
            'correo_electronico',
            'pass',
        ]);

        try {
            $empleado = Empleado::findOrFail($id); // Cambiado a Empleado
            $empleado->update($data);
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            Empleado::destroy($id); // Cambiado a Empleado
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function list_empleados()
    {
        try {
            $employees = Empleado::orderBy('idusuario', 'DESC')->get(); // Cambiado a Empleado
            return response()->json($employees);
        } catch (\Exception $e) {
            return response()->json([]);
        }
    }

    public function get_employee($id)
    {
        try {
            $employee = Empleado::findOrFail($id); // Cambiado a Empleado
            return response()->json($employee);
        } catch (\Exception $e) {
            return response()->json(null);
        }
    }
}
