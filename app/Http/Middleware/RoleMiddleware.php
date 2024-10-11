<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario está autenticado y tiene el rol requerido
        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            // Redirige o muestra un error si no tiene acceso
            return redirect('/home')->with('error', 'No tienes acceso a esta sección.');
        }

        return $next($request);
    }
}

