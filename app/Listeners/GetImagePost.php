<?php

namespace App\Listeners;

use App\WpApi;
use Felix\Scraper\Crawler;
use App\Events\ScraperLink;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intervention\Image\ImageManagerStatic as ImageManager;

class GetImagePost implements ShouldQueue
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
     * @param  \App\Events\ScraperLink  $event
     * @return void
     */
    public function handle(ScraperLink $event)
    {
        // Optenemos lso datos desde cache
        $post = Cache::get($event->link->id);
        
        // Si el cache no existe, retornamos falso
        if (is_null($post)) {
            return false;
        }

        // Obtenemos la url de la imagen
        $data = Crawler::extracting($post['url'], $event->link->source->filter->image);
        
        if ($data->count() == 0) {
            return false;
        }

        $urlImage = $event->hasSchema( $data->text(), $event->link->source->url ); // Url de la imagen
        $fileName = str_slug($post['title']).'.jpg'; // Generamos un nombre amigable para la imagen
        $binaryImage = file_get_contents($urlImage); // Obtenemos la imagen en binario

        // Subir el la imagen a WordPress
        $media = (new WpApi)->addMedia($fileName, $binaryImage); // Subimos la imagen a WordPress

        // Actualizamos el post con el id de la imagen
        $posts = (new WpApi)->updatePost($post['id'], ['featured_media' => $media['id']]);
    }
}