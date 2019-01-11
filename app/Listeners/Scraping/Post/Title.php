<?php

namespace App\Listeners\Scraping\Post;

use App\WpApi;
use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\Scraping\Post\Title as EventsScrapingPostTitle;
use App\Events\Scraping\Post\Content as EventsScrapingPostContent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Title
{
    private $api;
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
     * @param  PostScraping  $event
     * @return void
     */
    public function handle(EventsScrapingPostTitle $event)
    {
        // Optenemos la url desde cache
        $post = Cache::get($event->hash);

        // Obtenemos el titulo de la noticia
        $data = Crawler::extracting($post["url"], $post["newspaper"]["scraper"]["title"]);

        // Si no existe titulo retornar 'false'
        if ($data->count() === 0) {
            return false;
        }

        // Limpiar el titulo de caracteres extraños
        $title = Str::clean($data->text());

        // Buscamos el titulo de la noticia en la BD
        $posts = $this->api->getPosts([ 'search' => $title ]);

        // Si la noticia ya está creada terminar el ciclo
		if ($posts->count() === 1) {
			return false;
        }

        // Datos del posts que sea agregaran
        $body = [
            'title' => $title,
            'content' => '<a href="'.$post["url"].'" target="blank">'.$post["newspaper"]["name"].'</a>',
            'status' => 'publish', // publish, future, draft, pending, private
            'comment_status' => 'closed',
            'format' => 'link', // standard (default), aside, gallery, link, image, quote, status, video
        ];

        // Crear la noticia en WordPress
        $posts = $this->api->addPosts($body);

        // Agregamos el id del posts al cache
        $post['id'] = $posts->first();
        $expiresAt = now()->addHours(48);
        Cache::put($event->hash, $post, $expiresAt);

        // Ejecutamos el evento para seguir con la recoleccion de datos
        event(new EventsScrapingPostContent($event->hash));
    }
}
