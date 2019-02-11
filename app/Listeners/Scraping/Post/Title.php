<?php

namespace App\Listeners\Scraping\Post;

use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Scraping\Post\Title as EventsScrapingPostTitle;
use App\Events\Scraping\Post\Content as EventsScrapingPostContent;

class Title
{
    /**
     * Handle the event.
     *
     * @param  PostScraping  $event
     * @return void
     */
    public function handle(EventsScrapingPostTitle $event)
    {
        // Optenemos la url desde cache
        $post = Cache::get($event->hash);

        // Obtenemos el titulo de la noticia
        $data = Crawler::extracting($post["url"], $post["newspaper"]["scraper"]["title"]);

        // Si no existe titulo retornar 'false'
        if ($data->count() === 0) {
            return false;
        }

        // Limpiar el titulo de caracteres extraños
        $title = Str::clean($data->text());

        // Guardamos el titulo del posts
        // $post['id'] = $posts->first();
        $post['title'] = $title;
        $expiresAt = now()->addHours(48);
        Cache::put($event->hash, $post, $expiresAt);

        // Ejecutamos el evento para seguir con la recoleccion de datos
        event(new EventsScrapingPostContent($event->hash));
    }
}
