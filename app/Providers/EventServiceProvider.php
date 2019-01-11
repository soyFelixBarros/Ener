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
        'App\Events\Scraping' => [
            'App\Listeners\Scraping' // Obtener el enlace del post
        ],
        'App\Events\Scraping\Post\Title' => [
            'App\Listeners\Scraping\Post\Title' // Obtener el titulo de la noticia
        ],
        'App\Events\Scraping\Post\Content' => [
            'App\Listeners\Scraping\Post\Content' // Obtener el contenido de la noticia
        ],
        // 'App\Events\Scraping\Post\Exists' => [
        //     'App\Listeners\Scraping\Post\Exists', // Buscamos si existe el posts en la base de datos
        // ],
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
