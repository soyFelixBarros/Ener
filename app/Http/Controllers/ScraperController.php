<?php

namespace App\Http\Controllers;

use App\Link;
use Felix\Scraper\Url;
use Felix\Scraper\Crawler;
use App\Events\PostScraped;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
	/**
	 * Comenzaro con el proceso de raspado web.
	 *
	 * @return Object
	 */
	public function index()
	{
        // Obtener el ultimo enlace
        $link = Link::where('active', true)->oldest('updated_at')->first();

        // Cambiar el estado del enlace
        $link->update(['scraping' => true]);

        // Prepara el crawler y ejecutar
        $data = Crawler::extracting($link->url, $link->newspaper->scraper->title);

        $status = (boolean) $data->count();

        $url = null;

        if ($status) {
            // Obtener el enlace del utlimo post
            $urlPost = $data->attr('href');

            // Normalizamos la url
            $urlPost = new Url($urlPost);

            // Disparamos el evento para obtener el contenido de una notcia
            event(new PostScraped($urlPost));
        }

        dd(['url' => $link->url, 'scraping' => $status, 'post' => $url]);
        
        // Cambiar el estado del enlace
        $link->update(['scraping' => false]);
	}
}