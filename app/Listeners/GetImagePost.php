<?php

namespace App\Listeners;

use App\WpApi;
use Felix\Scraper\Crawler;
use App\Events\ScraperLink;
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
        $unixTimestamp = $event->link->updated_at->timestamp;
        
        if ( ! Cache::has($unixTimestamp) ) // Si no existe el post
            return false; // retornar false
        
        // Optenemos lso datos desde cache
        $post = Cache::get($unixTimestamp);
        
        // Obtenemos la url de la imagen
        try {
            $data = Crawler::extracting($post['url'], $event->link->source->filter->image);
        } catch(Exception $e) { // I guess its InvalidArgumentException in this case
            return false;
        }

        $urlImage = $event->hasSchema( $data->text(), $event->link->source->url ); // Url de la imagen
        $fileName = str_slug($post['title']).'.jpg'; // Generamos un nombre amigable para la imagen
        $binaryImage = file_get_contents($urlImage); // Obtenemos la imagen en binario

        // Subir el la imagen a WordPress
        $media = (new WpApi)->addMedia($fileName, $binaryImage); // Subimos la imagen a WordPress
        
        // Actualizamos el caché
        $post['media_id'] = $media['id'];
        $expiresAt = now()->addHours(48);
        Cache::put($unixTimestamp, $post, $expiresAt);
    }
}