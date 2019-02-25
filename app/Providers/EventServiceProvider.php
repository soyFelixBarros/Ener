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
        'App\Events\ScraperLink' => [
            'App\Listeners\GetUrlPost', // Obtener el enlace del post
            'App\Listeners\GetTitlePost', // Obtener el titulo del post
            'App\Listeners\CheckingPostExists', //  Comprobando si existe el post
            'App\Listeners\PublishPostWordpress', // Publicar post en wordpress
            'App\Listeners\GetImagePost', //  Obtener la imagen del post
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
