<?php

namespace App\Listeners;

use Felix\Scraper\Url;
use Felix\Scraper\Crawler;
use App\Events\Scraping as EventsScraping;
use App\Events\Scraping\Post\Title as EventsScrapingPostTitle;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Scraping
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
     * @param  Scraping  $event
     * @return void
     */
    public function handle(EventsScraping $event)
    {
        // Prepara el crawler y ejecutar
        $data = Crawler::extracting($event->link->url, $event->link->newspaper->scraper->href);
        
        if ($data->count() === 0) {
            // $event->link->update(['active' => false]);
            return false;
        }
        
        // Obtener el enlace del utlimo post y normalizar
        $href = $data->attr('href');
                            
        // Normalizar url
        $url = Url::normalize($href, $event->link->newspaper->website);

        // Generamos un hash
        $hash = md5($url);

        $post = [
            'url' => $url,
            'newspaper' => $event->link->newspaper->toArray(),
        ];

        // Si el hash existe finalziamos los eventos
        Cache::flush();

        if (Cache::has($hash)) {
            return false;
        }

        // Guardamos el la noticia en cache, unas 48 horas
        $expiresAt = now()->addHours(48);

        // Creamos el cache con su limite de tiempo
        Cache::add($hash, $post, $expiresAt);

        // Ejecutamos el evento para seguir con la recoleccion de datos
        event(new EventsScrapingPostTitle($hash));
    }


}