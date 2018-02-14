<?php

namespace App\Listeners;

use Felix\Scraper\Crawler;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExtractingPostTitle implements ShouldQueue
{
    /**
	* Eliminar espacios en blanco de una cadena.
	* 
	* @param  string $str Cada de texto.
	*
	* @return string
	*/
	public function remove_spaces($str)
	{
		$str = html_entity_decode($str);
		$str = str_replace("\xc2\xa0", '', $str);
        $str = trim($str);

		return $str;
	}
	/**
	* Eliminar multiples espacios en blanco entre dos cadenas.
	* 
	* @param  string $str Cada de texto.
	* 
	* @return string
	*/
	public function remove_multi_spaces($str)
	{
        $str = preg_replace('!\s+!', ' ', $str);

		return $str;
    }
    
    /**
	* Limpiar una cadena de caracteres.
	* 
	* @param string $str Cadena de caracteres a limpiar. 
	* 
	* @return string
	*/
	public function clean($str)
	{
		$str = $this->remove_spaces($str);
        $str = $this->remove_multi_spaces($str);

		return $str;
	}

    /**
     * Handle the event.
     *
     * @param  PostScraped  $event
     * @return void
     */
    public function handle($event)
    {
        $data = Crawler::extracting($event->post->url, $event->post->xpath->title);

        // Si no existe titulo retornar 'false'
        if (! (boolean) $data->count()) {
            return false;
        }

        // Limpiar el titulo de caracteres extraños
        $title = $this->clean($data->text());

        // Crear post con un título
        $post = \App\Post::create([
            'country_id' => $event->post->country_id,
            'province_id' => $event->post->province_id,
            'newspaper_id' => $event->post->newspaper_id,
            'title' => $title,
            'url' => $event->post->url,
            'url_hash' => $event->post->url_hash
        ]);
        
        dd($post);
    }
}