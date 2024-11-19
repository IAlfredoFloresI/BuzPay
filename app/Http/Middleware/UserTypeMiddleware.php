<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserTypeMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user || $user->clasificacion != $role) {
            return redirect()->route('login')->with('error', 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
