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

        $content = implode("\n", $arr);

        // Datos del posts que sea agregaran
        $body = [
            'content' => $content,
            'format' => 'standard', // standard (default), aside, gallery, link, image, quote, status, video
        ];

        // Actualziar la noticia en WordPress
        $posts = $this->api->updatePost($post['id'], $body);

        dump($post["url"]);
    }
}
