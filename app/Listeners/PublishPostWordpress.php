<?php

namespace App\Listeners;

use App\WpApi;
use App\Events\ScraperLink;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublishPostWordpress implements ShouldQueue
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

        // Datos del posts que sea agregaran
        $body = [
            'title' => $post['title'],
            // 'excerpt' => 'Read this awesome post',
            'content' => '<a href="'.$post["url"].'" target="blank">'.$event->link->source->name.'</a>',
            'status' => 'publish', // publish, future, draft, pending, private
            'comment_status' => 'closed',
            'format' => 'link', // standard (default), aside, gallery, link, image, quote, status, video
            //'categories' => 6, // category ID
            //'tags' => '7',
            'terms' => [
                'source' => [$event->link->source->tax_id] // id de la fuente
            ],
        ];

        // Crear la noticia
        $posts = (new WpApi)->addPosts($body);

        // Actualizamos el caché
        $post = Arr::add($post,'id', $posts['id']);
        Cache::put($event->link->id, $post, now()->addMinutes(1));
    }
}