<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    // Redirige a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Maneja la respuesta de Google
    // Maneja la respuesta de Google
    public function handleGoogleCallback()
    {
        try {
            // Obtiene los datos del usuario de Google
            $googleUser = Socialite::driver('google')->user();

            // Registra el usuario en los logs para depuración
            Log::info('Datos de Google:', [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
            ]);

            // Buscar usuario en la base de datos por su correo
            $user = User::where('email', $googleUser->getEmail())->first();

            // Si el usuario no existe, crear una nueva cuenta
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'curp' => '', // Asigna un valor por defecto o deja esto vacío si no se requiere
                    'nacimiento' => null, // Asigna un valor por defecto o deja esto vacío si no se requiere
                    'password' => bcrypt(Str::random(8)), // Asigna una contraseña aleatoria
                ]);

                // Registra la creación de un nuevo usuario
                Log::info('Nuevo usuario creado:', ['id' => $user->id]);
            } else {
                // Registra que se encontró un usuario existente
                Log::info('Usuario existente encontrado:', ['id' => $user->id]);
            }

            // Inicia sesión con el usuario
            Auth::login($user, true); // El segundo argumento es true para recordar al usuario

            // Redirige a la ruta de administrador
            return redirect('/admin');
        } catch (\Exception $e) {
            Log::error('Error al manejar la respuesta de Google: ' . $e->getMessage());
            return redirect('/login')->withErrors(['error' => 'No se pudo iniciar sesión con Google.']);
        }
    }
}
