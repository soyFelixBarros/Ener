<?php

namespace App\Listeners;

use App\Events\ScraperLink;
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
     * @param  \App\Events\ScraperLink  $event
     * @return void
     */
    public function handle(ScraperLink $event)
    {
        //
    }
}