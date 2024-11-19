<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    // En RegisterController.php
public function list()
{
    try {
        // Obtener todos los empleados de la tabla 'users'
        $employees = Empleado::all();

        // Devolver los empleados como una respuesta JSON
        return response()->json($employees);
    } catch (\Exception $e) {
        // Manejo de errores en caso de que ocurra un problema
        return response()->json(['error' => 'No se pudo cargar la lista de empleados.'], 500);
    }
}

    public function index()
    {
        $employees = Empleado::all();
        return view('employees.index', compact('employees'));
    }

    public function store(Request $request)
    {
        // Definir las reglas de validación sin los apellidos
        $validatedData = $request->validate([
            'txt_nombre' => 'required|string|max:255',
            'txt_curp' => 'required|string|max:18|unique:users,curp',
            'txt_correo_electronico' => 'required|email|unique:users,email',
            'txt_password' => 'required|string|min:8',
            'txt_clasificacion' => 'required|string|max:255',
        ]);
    
        // Crear el nuevo empleado
        $employee = new Empleado();
        $employee->fill($validatedData); // Rellenar con los datos validados
        $employee->save();
    
        return response()->json(['status' => 'success', 'message' => 'Empleado registrado correctamente.']);
    }
    

    public function show($id)
    {
    // Verificar que el ID es un número válido
    if (!is_numeric($id)) {
        // Redirigir a la página de listado de empleados con un mensaje de error
        return redirect()->route('employees.index')->with('error', 'ID de empleado inválido');
    }

    // Si es un número, proceder con la búsqueda del empleado
    $employee = Empleado::findOrFail($id);

    return response()->json($employee);
    }

    // En RegisterController.php
public function register(Request $request)
{
    // Validar los datos de entrada
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        // Agregar validaciones para otros campos si es necesario
    ]);

    try {
        // Crear un nuevo empleado
        $employee = new Empleado();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password); // Asegúrate de encriptar la contraseña
        $employee->curp = $request->curp;
        $employee->clasificacion = $request->clasificacion;
        $employee->nacimiento = $request->nacimiento;
        $employee->tienda = $request->tienda;
        // Agregar más campos si es necesario
        $employee->save();

        return response()->json(['status' => 'success', 'message' => 'Empleado registrado correctamente.']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Error al registrar el empleado: ' . $e->getMessage()]);
    }
}


    public function update(Request $request, $id)
    {
        $employee = Empleado::findOrFail($id);

        $request->validate([
            'curp' => 'required|max:18',
            'nacimiento' => 'required|date',
            'clasificacion' => 'required|string',
            'tienda' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,


        ]);

        $employee->update($request->all());
        return response()->json(['status' => 'success']);
    }

    public function destroy($id)
    {
        $employee = Empleado::findOrFail($id);
        $employee->delete();
        return response()->json(['status' => 'success']);
    }
}
