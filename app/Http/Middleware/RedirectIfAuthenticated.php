<?php

namespace GIDV\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *Este metodo permite solo el ingreso a la plataforma a aquellos usuarios autenticados y activos
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->us_estado==1) {
            return redirect('/home');
        }

        return $next($request);
    }
}
