<?php

namespace App\Listeners;

use App\WpApi;
use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\ScraperLink;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckingPostExists implements ShouldQueue
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
     * 
     * @param  \App\Events\ScraperLink  $event
     * @return void
     */
    public function handle(ScraperLink $event)
    {
        $unixTimestamp = $event->link->updated_at->timestamp;

        // Optenemos la url desde cache
        $post = Cache::get($unixTimestamp);

        // Buscamos el titulo de la noticia en la BD
        $posts = (new WpApi)->getPosts([
            'search' => $post['title']
        ]);

        // Si el post ya existe...
        if ($posts->count() > 0) {
            Cache::forget($unixTimestamp); // Eliminamos el post del cache
            return false; // Retornamos falso
        }

        $body = [
            'title' => $post['title'],
            // 'excerpt' => 'Read this awesome post',
            'content' => '<a href="'.$post["url"].'" target="blank">'.$event->link->source->name.'</a>',
            'status' => 'pending', // publish, future, draft, pending, private
            'comment_status' => 'closed',
            'format' => 'link', // standard (default), aside, gallery, link, image, quote, status, video
            'terms' => [
                'source' => [$event->link->source->tax_id] // id de la fuente
            ]
        ];

        // Crear la noticia en modo pendiente
        $posts = (new WpApi)->addPosts($body);
        
        // Actualizamos el caché
        $post['id'] = $posts['id'];
        $expiresAt = now()->addHours(48);
        Cache::put($unixTimestamp, $post, $expiresAt);
    }
}