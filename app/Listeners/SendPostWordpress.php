<?php

namespace App\Listeners;

use App\WpApi;
use App\Events\ScraperLink;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostWordpress implements ShouldQueue
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
        
        if (!Cache::has($unixTimestamp)) // Si no existe el post
            return false; // retornar false

        // Optenemos la url desde cache
        $post = Cache::get($unixTimestamp);

        $media = json_encode(array('diarios'));

        // Datos del posts que sea agregaran
        $body = [
            'title' => $post['title'],
            'content' => '<a href="'.$post["url"].'" target="blank">'.$event->link->source->name.'</a>',
            'status' => 'publish', // publish, future, draft, pending, private
            'comment_status' => 'closed',
            'format' => 'link', // standard (default), aside, gallery, link, image, quote, status, video
        ];
        
        // Crear la noticia en WordPress
        $posts = (new WpApi)->addPosts($body);
    }
}