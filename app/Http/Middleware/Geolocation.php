<?php

namespace App\Http\Middleware;

use Closure;

class Geolocation
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

        if (! $request->session()->has('user')) {
            // $ip = '190.183.93.172';
            // $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

            // if (isset($query) && $query['status'] == 'success') {

            //     session(['user' => [
            //         'country_code' => $query['countryCode'],
            //         'province_code' => $query['countryCode'].'-'.$query['region'],
            //         'state' => $query['regionName'],
            //         'country' => $query['country'],
            //     ]]);
            // }
                session(['user' => [
                    'country_code' => 'AR',
                    'province_code' => 'AR-H',
                    'state' => 'Chaco',
                    'country' => 'Argentina',
                ]]);
        }

        return $next($request);
    }

}