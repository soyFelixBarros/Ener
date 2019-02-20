<?php

namespace App\Listeners;

use App\Events\Scraping;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetImagePost implements ShouldQueue
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
        var_dump('Esto no se tiene que ver');
    }
}