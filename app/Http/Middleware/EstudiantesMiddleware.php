<?php

namespace GIDV\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class EstudiantesMiddleware
{
    /**
     * Handle an incoming request.
     * Este metodo permite que los docentes no puedan manipular a los estudiantes
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(Auth::user()->us_idRolFK==3){
            return redirect('/estudiantes');
        }
        else{
            return $next($request);
        }
    }
}
