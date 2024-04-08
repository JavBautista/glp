<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CollectorMiddleware
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
        if( $request->route('trk') !== null ){
            Session::put('trk', $request->route('trk') );
        }
        if( auth()->check() && auth()->user()->authorizeRoles(['collector']) )
            return $next($request);

        return redirect('/login');
    }
}
