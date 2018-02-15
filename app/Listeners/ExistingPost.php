<?php

namespace App\Listeners;

use Felix\Scraper\Crawler;
use App\Events\PostScraped;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExistingPost implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PostScraped  $event
     * @return void
     */
    public function handle(PostScraped $event)
    {
        $existsPost = \App\Post::where('url_hash', $event->post->url_hash)->exists();
        
        // if ($existsPost) {
        //     return false;
        // }
        $event->post->xpath->status = false;
    }
}