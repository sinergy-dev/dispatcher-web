<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Log;

class RoleMiddleware
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
        if(Auth::user()->id_type == 1){
            Log::debug('Engineer try to access');
            // return view('/welcome');
            // return $next($request);
            return redirect()->route('welcome_engineer');

        } else {
            return $next($request);
        }
    }
}
