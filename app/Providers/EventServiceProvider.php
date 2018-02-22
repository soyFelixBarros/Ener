<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\PageScraping' => [
            'App\Listeners\ExtractingPostLink'
        ],
        'App\Events\PostScraping' => [
            'App\Listeners\CheckingPostExists',
            'App\Listeners\ExtractingPostTitle',
            'App\Listeners\ExtractingPostContent',
            'App\Listeners\ExtractingPostImage'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
