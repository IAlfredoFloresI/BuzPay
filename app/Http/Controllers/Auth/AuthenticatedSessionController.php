<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        // Redirección basada en el tipo de usuario
        $user = Auth::user();
        switch ($user->clasificacion) {
            case 1: // Dueño
                return redirect()->intended('/admin');
            case 2: // Empleado
                return redirect()->intended('/empleado');
            case 3: // Cliente
                return redirect()->intended('/cliente');
            default:
                Auth::logout(); // Si no coincide con ningún tipo, cerrar sesión
                return redirect('/login')->with('error', 'Acceso no autorizado.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectTo()
    {
        return '/'; // o la ruta que desees
    }
}
