<?php

namespace App\Listeners;

use App\Events\Scraping;
use Felix\Scraper\Crawler;
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
        $content = $data->attr('href');

        // ¿Tiene http o https la url?
        if (preg_match("@^http://@i", $content)) {
            $url = $content;
        } else {
            $sourceUrl = rtrim($event->link->source->url, "/"); // Quitamos la barra final
            $url = $sourceUrl . $content; // Concatenamos las dos partes de la url
        }
        
        var_dump($url);
    }
}