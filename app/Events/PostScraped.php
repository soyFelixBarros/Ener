<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class PostScraped
{
    use SerializesModels;
    
    public $link;

    /**
     * Create a new event instance.
     *
     * @param  Link  $link
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link;
    }
}