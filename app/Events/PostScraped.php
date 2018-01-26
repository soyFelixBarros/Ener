<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class PostScraped
{
    use SerializesModels;
    
    public $post;

    /**
     * Create a new event instance.
     *
     * @param  Post  $post
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }
}