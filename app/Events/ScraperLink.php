<?php

namespace App\Events;

use URL\Normalizer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ScraperLink
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $link;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('scraper');
    }

    /**
     * Metodo para determinar si una URL contiene http o https.
     */
    public function hasSchema(string $url, string $domain = '') : string
    {
        if (strpos($url, '//') === 0 ) {
            $url = 'http:'.$url;
        }

        if (!preg_match("@^https?:\/\/@i", $url)) { // URL no contiene http:// o https://
            $url = ltrim($url, "/"); // Quiamos la barra al principio
            $domain = rtrim($domain, "/"); // Quitamos la barra final
            $url = $domain .'/' . $url; // Concatenamos las dos partes de la url
        }

        return (new Normalizer($url))->normalize();
    }
}
