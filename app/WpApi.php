<?php

namespace App;

use GuzzleHttp;
use Illuminate\Support\Collection;

class WpApi
{
    private $client;
    private $url;
    private $auth;

    public function __construct()
    {
        $this->url = config('wp.url');
        $this->client = new \GuzzleHttp\Client(['base_uri' => $this->url]);
        $this->auth = config('wp.auth');
    }

    /**
     * Metodo para crear un post.
     * 
     * @return Collection
     */
	public function addPosts(array $json)
	{
	    return $this->post('posts', $json);
    }

    /**
     * Metodo para actualizar un post.
     * 
     * @return Collection
     */
	public function updatePost($id, array $json)
	{
	    return $this->post('posts/'.$id, $json);
    }

    /**
     * Metod para realizar un POST al punto final pasado como parametro.
     *
     * @return Collection
     */
    public function post(string $endPoints, array $json = [])
    {
        $query = [
            'json' => $json,
            'auth' => $this->auth,
        ];
        return Collection::make($this->sendRequest($endPoints, $query, 'POST'));
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
        $query = ['query' => $query];
        return Collection::make($this->sendRequest($endPoints, $query));
    }

    /**
     * Send the request
     * 
     * @return json
     */
	public function sendRequest($requestname, array $query, string $method = 'GET')
	{
		$results = $this->client->request($method, $requestname, $query);

		if ($results) {
		    return json_decode($results->getBody(), true);
        }
        
        return json_decode($results=[], true);
	}
}
