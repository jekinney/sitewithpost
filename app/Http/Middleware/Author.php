<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Author
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ( Auth::guard($guard)->guest() || Auth::guard($guard)->user()->author == 0 ) {

            return abort( 501, 'Unauthorizerd' );

        }

        return $next($request);
    }
}
