<?php

namespace App\Listeners;

use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\PostScraped;

class ExtractingPostTitle
{
    /**
     * Handle the event.
     *
     * @param  PostScraped  $event
     * @return void
     */
    public function handle(PostScraped $event)
    {
		$existsPost = \App\Post::where('url_hash', $event->post->url_hash)->exists();
        
		if (! $existsPost) {
			$data = Crawler::extracting($event->post->url, $event->post->xpath->title);

			// Si no existe titulo retornar 'false'
			if (! (boolean) $data->count()) {
				return false;
			}
	
			// Limpiar el titulo de caracteres extraños
			$title = Str::clean($data->text())->get();
	
			// Crear post con un título
			$post = \App\Post::create([
				'country_id' => $event->post->country_id,
				'province_id' => $event->post->province_id,
				'newspaper_id' => $event->post->newspaper_id,
				'title' => $title,
				'url' => $event->post->url,
				'url_hash' => $event->post->url_hash
			]);
		}
    }
}