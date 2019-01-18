<?php

namespace App\Listeners\Scraping\Post;

use App\WpApi;
use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Scraping\Post\Content as EventsScrapingPostContent;

class Content
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
    public function handle(EventsScrapingPostContent $event)
    {
        // Optenemos el post desde cache
        $post = Cache::get($event->hash);

        // Obtenemos el contenido el post
        $data = Crawler::extracting($post["url"], $post["newspaper"]["scraper"]["content"]);

		// Si no existe titulo retornar 'false'
		if ($data->count() == 0) {
			return false;
        }

        // Obtener todos los párrafos
        $paragraphs = $data->extract(array('_text'));
        $arr = array();

		foreach ($paragraphs as $p) {
         $p = Str::clean($p);
			if ($p != "") {
				array_push($arr, $p);
			}
        }
        
        $source = '<a href="'.$post["url"].'" target="blank">'.$post["newspaper"]["name"].'</a>';
        $content = implode("\n\r\n", $arr)."\n\r\nFuente: ". $source; // Concatenamos el contenido que está en cache

        // CREAMOS EL POST CON TITULO Y CONTENIDO
        // Datos del posts que sea agregaran
        $body = [
            'title' => $post['title'],
            'content' => $content,
            'status' => 'pending', // publish, future, draft, pending, private
            'comment_status' => 'closed',
            'format' => 'standard', // standard (default), aside, gallery, link, image, quote, status, video
        ];

        dd($body);
        
        // Crear la noticia en WordPress
        $posts = $this->api->addPosts($body);

        // Agregamos el id del posts al cache
        $post['content'] = $body['content']; // Actualizamos el cache con el contenido nuevo
        $expiresAt = now()->addHours(48);
        Cache::put($event->hash, $post, $expiresAt);
        $post = Cache::get($event->hash);
        dd($post);
    }
}
