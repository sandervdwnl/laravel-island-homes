<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if user is not admin, redirect with 403
        if( !auth()->check() || !auth()->user()->is_admin == 1) 
        {
            abort(403);
        }

        return $next($request);
    }
}
