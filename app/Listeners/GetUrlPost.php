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
        } catch(Exception $e) { // I guess its InvalidArgumentException in this case
            return false;
        }

        // Obtener el enlace del utlimo post y normalizar
        $href = $data->attr('href');
        $url = $event->hasSchema($href, $event->link->source->url);

        // Actualziamos la hora y fecha del link
        $event->link->update([
            'updated_at' => now()
        ]);

        $unixTimestamp = now()->timestamp; // Usamos la fecha unix como identificador del cache
        
        // Ver si existe el cache
        if (Cache::has($unixTimestamp))
            return false;

        // Guardamos el la noticia en cache, unas 48 horas
        $expiresAt = now()->addHours(48);

        // Creamos el cache con su limite de tiempo
        Cache::add($unixTimestamp, [
            'url' => $url
        ], $expiresAt);
    }
}