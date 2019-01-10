<?php

namespace App;

use Illuminate\Support\Collection;
use GuzzleHttp;

class WpApi
{
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->url = config('wp.url');
        $this->auth = config('wp.auth');
    }
    
    /**
     * Metodo para obtener todos los posts.
     * 
     * @return Collection
     */
	public function getPosts(array $query)
	{
	    return $this->get('posts', $query);
    }

    /**
     * Metod para realizar un get al punto final pasado como parametro.
     *
     * @return Collection
     */
    public function get(string $endPoints, array $query = [])
    {
        return Collection::make($this->sendRequest($endPoints, $query));
    }

    /**
     * Send the request
     * 
     * @return json
     */
	public function sendRequest($requestname, array $query, string $method = 'GET')
	{
		$results = $this->client($method, $this->url . $requestname, [
            'query' => $query,
            $this->auth,
        ]);
		if ($results)
		{
		    return json_decode($results->getBody(), true);
		} else {
			return json_decode($results=[], true);
		}
	}
}
