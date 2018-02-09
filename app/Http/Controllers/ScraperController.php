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

                // Prepara el crawler y ejecutar
                $crawler = new Crawler($link->url, $link->newspaper->scraper->title);
                $crawler->start();

                // Obtener el enlace del utlimo post
                $baseUrl = $crawler->getContent()->attr('href');
                
                // Normalizamos la url
                $url = new Url($baseUrl);

                // Disparamos el evento link para escrapear 
                event(new PostScraped($url->normalize($link->newspaper->website)));
	}
}