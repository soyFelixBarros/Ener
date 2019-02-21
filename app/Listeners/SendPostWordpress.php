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
            'status' => 'publish', // publish, future, draft, pending, private
            // 'categories' => 6, // category ID
            // 'tags' => '7',
        ];

        // Agregamos el media_id al post, si existe. Y actualizamos el el media con el id del post
        if ( isset($post['media_id']) ) {
            $media = (new WpApi)->updateMedia($post['media_id'], [
                // 'title' => $post['title'],
                'post' => $post['id'],
                'comment_status' => 'closed',
            ]);

            $body['featured_media'] = $media['id'];
        }
        
        // Publciar la noticia en WordPress
        $posts = (new WpApi)->updatePost($post['id'], $body);
    }
}