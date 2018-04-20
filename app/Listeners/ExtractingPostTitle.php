<?php

namespace App\Listeners;

use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\PostScraping;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExtractingPostTitle
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
		$title = Str::clean($data->text());

		// Crear post con un título
		$post = new \App\Post;
		$post->country_id = $event->post->country_id;
		$post->province_id = $event->post->province_id;
		$post->newspaper_id = $event->post->newspaper_id;
		$post->category_id = $event->post->category_id;
		$post->title =  $title;
		$post->url = $event->post->url;
		$post->url_hash = $event->post->url_hash;
		$post->save();

		var_dump($title);
    }
}