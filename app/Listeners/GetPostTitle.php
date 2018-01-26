<?php

namespace App\Listeners;

use App\Events\PostScraped;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetPostTitle implements ShouldQueue
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
     * @param  PostScraped  $event
     * @return void
     */
    public function handle(PostScraped $event)
    {
        dd($event->post->title);

        // Access the order using $event->order...
        // return false; // Retornar falso si el post ya existe
    }
}