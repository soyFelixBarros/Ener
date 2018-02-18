<?php

namespace App\Listeners;

use Felix\Scraper\Url;
use Felix\Scraper\Crawler;
use App\Events\PageScraping;
use App\Events\PostScraping;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExtractingPostLink implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PageScraping  $event
     * @return void
     */
    public function handle(PageScraping $event)
    {
        // Prepara el crawler y ejecutar
        $data = Crawler::extracting($event->link->url, $event->link->newspaper->scraper->href);
        
		if ($data->count() === 0) {
            $event->link->update(['active' => false]);
            return false;
        }

        // Obtener el enlace del utlimo post y normalizar
		$href = $data->attr('href');
					
		// Normalizar url
        $url = new Url($href);
        					
		// Disparar el evento para comenzar a obtener los diferentes elemento 
		event(new PostScraping((object) [
			'country_id' => $event->link->newspaper->country->id,
			'province_id' => $event->link->newspaper->province->id,
			'newspaper_id' => $event->link->newspaper->id,
			'url' => $url->normalize($event->link->newspaper->website),
			'url_hash' => $url->getHash(),
			'xpath' => $event->link->newspaper->scraper
		]));
    }
}