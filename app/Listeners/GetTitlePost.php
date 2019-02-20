<?php

namespace App\Listeners;

use Felix\Scraper\Str;
use App\Events\Scraping;
use Felix\Scraper\Crawler;
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
     * @param  \App\Events\Scraping  $event
     * @return void
     */
    public function handle(Scraping $event)
    {
        $unixTimestamp = $event->link->updated_at->timestamp;

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