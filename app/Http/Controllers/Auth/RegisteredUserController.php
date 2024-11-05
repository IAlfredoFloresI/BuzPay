<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'curp' => 'required|string|max:18',
            'nacimiento' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Creación del nuevo usuario
        User::create([
            'name' => $request->name,
            'curp' => $request->curp,
            'nacimiento' => $request->nacimiento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Agrega otros campos si es necesario
        ]);

        // Redirigir o devolver respuesta después del registro exitoso
        return redirect()->route('login')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }
}
