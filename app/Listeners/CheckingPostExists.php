<?php

namespace App\Listeners;

use App\WpApi;
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
        // Optenemos la url desde cache
        $post = Cache::get($event->link->id);

        // Buscamos el titulo de la noticia en la BD
        $posts = (new WpApi)->getPosts([
            'search' => $post['title']
        ]);

        // Si el post ya existe...
        if ($posts->count() > 0) {
            Cache::forget($event->link->id); // Eliminamos el post del cache
            return false; // Retornamos falso
        }
    }
}