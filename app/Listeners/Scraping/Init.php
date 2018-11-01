<?php

namespace App\Listeners\Scraping;

use Felix\Scraper\Url;
use Felix\Scraper\Crawler;
use App\Events\Scraping;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Init
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
    public function handle(Scraping $event)
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
        
        dump($url);
    }


}