<?php

namespace GIDV\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *Este metodo permite que solo los usuarios admin o directivos ingresen a las paginas en el que se relacione el middleware
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(Auth::user()->us_idRolFK==1 || Auth::user()->us_idRolFK==2 ){
            return $next($request);
        }
        else{
            return redirect('/home');
        }
    }
}
