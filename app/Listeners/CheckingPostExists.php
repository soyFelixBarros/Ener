<?php

namespace App\Listeners;

use App\WpApi;
use Felix\Scraper\Str;
use App\Events\Scraping;
use Felix\Scraper\Crawler;
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
        $this->api = new WpApi;
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

        // Buscamos el titulo de la noticia en la BD
        $posts = $this->api->getPosts([
            'search' => $post['title']
        ]);

        // var_dump($posts->count());
        
        return false;
    }
}