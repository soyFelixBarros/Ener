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
        if ($request->country == null) {
            $ip = env('IP', $request->ip());
            $host = env('APP_URL');
            $scheme = $request->getScheme();
            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
            if (isset($query) && $query['status'] == 'success') {
                $country = str_slug($query['country']);
                $province = str_slug($query['regionName']);
                $city = '?city='.str_slug($query['city']);
                // return redirect($scheme.'://'.$host.'/'.$country.'/'.$province.$city);
                return redirect($scheme.'://'.$country.'.'.$host.'/'.$province.$city);
            }
        }
        
        return $next($request);
    }

}