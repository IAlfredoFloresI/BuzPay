<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Muestra la lista de usuarios
    public function index()
    {
        $users = User::all();
        return view('admin_usuarios.index', compact('users'));
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        return view('admin_usuarios.create');
    }

    // Almacena un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'curp' => 'required|string|max:18|unique:users',
            'nacimiento' => 'required|date',
            'correo_electronico' => 'required|email|unique:users,correo_electronico',
            'pass' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'curp' => $request->curp,
            'nacimiento' => $request->nacimiento,
            'correo_electronico' => $request->correo_electronico,
            'pass' => Hash::make($request->pass),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    }

    // Muestra un usuario específico
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin_usuarios.show', compact('user'));
    }

    // Muestra el formulario para editar un usuario
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin_usuarios.edit', compact('user'));
    }

    // Actualiza un usuario específico
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'curp' => 'required|string|max:18|unique:users,curp,' . $id,
            'nacimiento' => 'required|date',
            'correo_electronico' => 'required|email|unique:users,correo_electronico,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'curp' => $request->curp,
            'nacimiento' => $request->nacimiento,
            'correo_electronico' => $request->correo_electronico,
            'pass' => $request->pass ? Hash::make($request->pass) : $user->pass,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
    }

    // Elimina un usuario específico
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
