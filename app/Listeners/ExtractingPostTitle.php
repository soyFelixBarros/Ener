<?php

namespace App\Listeners;

use Felix\Scraper\Crawler;
use App\Events\PostScraping;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExtractingPostTitle implements ShouldQueue
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

	public function clean($str) {
        $str = html_entity_decode($str);
        $str = str_replace("\xc2\xa0", "", $str);
        $str = trim($str);
		$str = preg_replace("!\s+!", " ", $str);
		
        return $str;
	}
	
    /**
     * Handle the event.
     *
     * @param  PostScraping $event
     * @return void
     */
    public function handle(PostScraping $event)
    {
		$data = Crawler::extracting($event->post->url, $event->post->xpath->title);

		// Si no existe titulo retornar 'false'
		if ($data->count() === 0) {
			return false;
		}

		// Limpiar el titulo de caracteres extraños
		$title = $this->clean($data->text());
		
		var_dump($title);

		// Crear post con un título
		$post = new \App\Post;
		$post->country_id = $event->post->country_id;
		$post->province_id = $event->post->province_id;
		$post->newspaper_id = $event->post->newspaper_id;
		$post->title =  $title;
		$post->url = $event->post->url;
		$post->url_hash = $event->post->url_hash;
		$post->save();
		
		var_dump("-------");
    }
}