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
        $host = env('SESSION_DOMAIN');
        $scheme = $request->getScheme();

        if (! $request->session()->exists('location')) {
            $ip = env('IP', $request->ip());
            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

            if (isset($query) && $query['status'] == 'success') {
                $request->session()->put(['location' => [
                    'country' => str_slug($query['country']),
                    'province' => str_slug($query['regionName']),
                    'city' => str_slug($query['city']),
                ]]);
            }
        }

        if (! is_null($request->spider)) {
            $location = (object) $request->session()->get('location');
            $country = $location->country;
            $province = $location->province;

            if ($province) {
                $redirect = $scheme.'://'.$province.'.'.$country.$host;
            } else {
                $redirect = $scheme.'://'.$country.$host;
            }

            return redirect($redirect);
        }

        return $next($request);
    }

}