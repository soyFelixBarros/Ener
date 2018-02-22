<?php

namespace App\Listeners;

use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\PostScraping;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExtractingPostContent
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
		$data = Crawler::extracting($event->post->url, $event->post->xpath->content);

		// Si no existe titulo retornar 'false'
		if ($data->count() === 0) {
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

        $post = \App\Post::where('url_hash', $event->post->url_hash)->update(['content' => $content]);

        var_dump($content);
    }
}