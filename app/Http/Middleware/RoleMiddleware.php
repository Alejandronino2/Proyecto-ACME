<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->user() || !$request->user()->roles()->where('name', $role)->exists()) {
            return redirect()->route('dashboard')->with('error', 'No tienes acceso a esta sección.');
        }

        return $next($request);
    }
}