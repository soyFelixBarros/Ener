<?php

namespace App\Http\Middleware;

use Closure;

class Location
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $response = $next($request);

        if (! is_null($request->country)) {
        }
        
        return $next($request);
    }

}