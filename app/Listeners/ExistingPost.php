<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;

class ExistingPost implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PostScraped  $event
     * @return void
     */
    public function handle($event)
    {
        $hasPost = \App\Post::where('url_hash', $event->post->url_hash)->exists();
        
        if ($hasPost) {
            return false;
        }
    }
}