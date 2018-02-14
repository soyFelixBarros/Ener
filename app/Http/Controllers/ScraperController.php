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
        $data = Crawler::extracting($link->url, $link->newspaper->scraper->href);

        if ((boolean) $data->count()) {
            // Obtener el enlace del utlimo post y normalizar
            $href = $data->attr('href');

            // Normalizar url
            $url = new Url($href);

            // Disparar el evento para comenzar a obtener los diferentes elemento 
            event(new PostScraped((object) [
                'country_id' => $link->newspaper->country->id,
                'province_id' => $link->newspaper->province->id,
                'newspaper_id' => $link->newspaper->id,
                'url' => $url->normalize($link->newspaper->website),
                'url_hash' => $url->getHash(),
                'xpath' => $link->newspaper->scraper
            ]));
        }

        dd($link->url);
        
        // Cambiar el estado del enlace
        $link->update(['scraping' => false]);
	}
}