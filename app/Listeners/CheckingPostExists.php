<?php

namespace App\Listeners;

use App\Events\PostScraping;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckingPostExists
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
     * @param  PostScraping  $event
     * @return void
     */
    public function handle(PostScraping $event)
    {
        $existsPost = \App\Post::where('url_hash', $event->post->url_hash)->exists();

        return ! $existsPost;
    }
}
