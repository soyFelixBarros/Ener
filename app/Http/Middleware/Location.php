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
        if (! $request->session()->exists('location') && is_null($request->scraper)) {
            $ip = env('IP', $request->ip());
            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
            $host = env('SESSION_DOMAIN');
            $scheme = $request->getScheme();

            if (isset($query) && $query['status'] == 'success') {
                $country = str_slug($query['country']);
                $province = str_slug($query['regionName']);
                $city = str_slug($query['city']);

                $request->session()->put(['location' => [
                    'country' => $country,
                    'province' => $province,
                    'city' => $city,
                ]]);

                if ($province) {
                    $redirect = $scheme.'://'.$province.'.'.$country.$host;
                } else {
                    $redirect = $scheme.'://'.$country.$host;
                }
                return redirect($redirect);
            }
        }
        
        return $next($request);
    }

}