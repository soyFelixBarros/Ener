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
        $response = $next($request);
        $key = 'location';

        if ($request->session()->exists($key)) {
            if (isset($request->country)) {
                $location = $request->session()->get($key);
                if ($request->country != $location['country']) {
                    $request->session()->put([$key => [
                        'country' => $request->country,
                        'province' => $request->province,
                    ]]);
                }
            }
        } else {
            $request->session()->put([$key => [
                'country' => $request->country,
                'province' => $request->province,
            ]]);
        }
        
        return $next($request);
    }

}