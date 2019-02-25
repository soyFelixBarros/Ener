<?php

namespace App\Listeners;

use Felix\Scraper\Crawler;
use App\Events\ScraperLink;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetUrlPost implements ShouldQueue
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
     * @param  \App\Events\ScraperLink  $event
     * @return void
     */
    public function handle(ScraperLink $event)
    {
        // Prepara el crawler y ejecutar
        try{
            $data = Crawler::extracting($event->link->url, $event->link->source->filter->link);
        } catch(Exception $e) {
            return false;
        }

        // Obtener el enlace del utlimo post y normalizar
        $href = $data->attr('href');
        $url = $event->hasSchema($href, $event->link->source->url);

        // Limpiamos el cache
        Cache::flush();

        // Guardamos en cache si no existe
        return Cache::add($event->link->id, ['url' => $url], now()->addMinutes(1));
    }
}