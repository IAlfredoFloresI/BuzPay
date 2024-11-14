<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            Log::info('Datos de Google:', [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
            ]);

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'email_verified_at' => Carbon::now(), 
                    'password' => bcrypt(Str::random(24)),
                ]);

                Log::info('Nuevo usuario creado y verificado:', ['id' => $user->id, 'email_verified_at' => $user->email_verified_at]);
            } else {
                Log::info('Usuario existente encontrado y autenticado:', ['id' => $user->id]);
            }

            // Forzar el campo email_verified_at para asegurarse de que esté actualizado
            $user->email_verified_at = Carbon::now();
            $user->save();

            Auth::login($user, true);

            return redirect('/admin');
        } catch (\Exception $e) {
            Log::error('Error al manejar la respuesta de Google: ' . $e->getMessage());
            return redirect('/login')->withErrors(['error' => 'No se pudo iniciar sesión con Google.']);
        }
    }
}
