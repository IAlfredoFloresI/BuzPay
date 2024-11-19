<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

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
            'face_descriptor' => 'required|json',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    

    
        // Creación del nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'curp' => $request->curp,
            'nacimiento' => $request->nacimiento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'face_descriptor' => $request->face_descriptor,
        ]);
    
        event(new Registered($user));
        Auth::login($user); 
    
        // Redirigir o devolver respuesta después del registro exitoso
        return redirect()->route('admin.index')->with('success', '¡Registro exitoso y sesión iniciada!');

    }
    

}
