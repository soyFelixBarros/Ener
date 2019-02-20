<?php

namespace App\Listeners;

use App\Events\Scraping;
use Felix\Scraper\Crawler;
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
     * @param  \App\Events\Scraping  $event
     * @return void
     */
    public function handle(Scraping $event)
    {
        // Prepara el crawler y ejecutar
        $data = Crawler::extracting($event->link->url, $event->link->source->filter->link);
        
        if ($data->count() === 0)
            return false;
        
        // Obtener el enlace del utlimo post y normalizar
        $url = $data->attr('href');

        // Ver si una url contiene http:// o https://
        if (!preg_match("@^https?:\/\/@i", $url)) { // URL no contiene http:// o https://
            $sourceUrl = rtrim($event->link->source->url, "/"); // Quitamos la barra final
            $url = $sourceUrl . $url; // Concatenamos las dos partes de la url
        }

        // Actualziamos la hora y fecha del link
        $event->link->update([
            'updated_at' => now()
        ]);

        $unixTimestamp = now()->timestamp; // Usamos la fecha unix como identificador del cache

        // Limpiamos el cache
        Cache::flush();
        
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