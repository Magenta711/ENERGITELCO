<?php

namespace App\Http\Middleware;

use Closure;

class CustomTiendaSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app('config')->set('session.cookie', 'tienda_session');

        return $next($request);
    }
}
