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
    private $wp;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->api = new WpApi;
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
        dump($title." - ".$value["newspaper"]["name"]);
        // $result = $api->getPosts([
        //     'search' => $event->post->title
        // ]);
    }
}
