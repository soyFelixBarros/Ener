<?php

namespace App\Listeners;

use App\WpApi;
use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\PostScraping;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckingPostExists
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
    public function handle(PostScraping $event)
    {
        // Optenemos la url desde cache
        $value = Cache::get($event->hash);

        // Obtenemos el titulo de la noticia
        $data = Crawler::extracting($value["url"], $value["newspaper"]["scraper"]["title"]);
        
		// Si no existe titulo retornar 'false'
		if ($data->count() === 0) {
			return false;
		}

		// Limpiar el titulo de caracteres extraños
        $title = Str::clean($data->text());

        dump($title.' - '.$value["newspaper"]["name"]);

        // // Buscamos el titulo de la noticia en la BD
        // $posts = $this->api->getPosts([ 'search' => $title ]);

        // // Si la noticia ya está creada terminar el ciclo
		// if ($posts->count() === 1) {
		// 	return false;
        // }

        // // Datos del posts que sea agregaran
        // $body = [
        //     'title' => $title,
        //     'content' => '<a href="'.$value["url"].'" target="blank">'.$value["newspaper"]["name"].'</a>',
        //     'status' => 'publish', // publish, future, draft, pending, private
        //     'comment_status' => 'closed',
        //     'format' => 'link', // standard (default), aside, gallery, link, image, quote, status, video
        // ];

        // Crear la noticia en WordPress
        // $posts = $this->api->addPosts($body);

        // // Mostrar en pantalla
        // dd($posts->first());
    }
}
