<?php

namespace App\Listeners;

use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\ScraperLink;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetTitlePost implements ShouldQueue
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
     * @param  \App\Events\ScrapingLink  $event
     * @return void
     */
    public function handle(ScraperLink $event)
    {
        $unixTimestamp = $event->link->updated_at->timestamp;
        
        if (!Cache::has($unixTimestamp))
            return false;
        
        // Optenemos la url desde cache
        $post = Cache::get($unixTimestamp);

        // Obtenemos el titulo de la noticia
        $data = Crawler::extracting($post["url"], $event->link->source->filter->title);

        // Si no existe titulo retornar 'false'
        if ($data->count() === 0)
            return false;
            
        // Limpiar el titulo de caracteres extraños
        $title = Str::clean($data->text());

        // Actualizamos el caché
        $post['title'] = $title;
        $expiresAt = now()->addHours(48);
        Cache::put($unixTimestamp, $post, $expiresAt);
    }
}