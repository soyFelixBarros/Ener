<?php

namespace App\Jobs;

use Felix\Scraper\Url;
use Felix\Scraper\Crawler;
use App\Events\PostScraped;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $link;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Prepara el crawler y ejecutar
        $data = Crawler::extracting($this->link->url, $this->link->newspaper->scraper->href);
            
        if ((boolean) $data->count()) {
            // Obtener el enlace del utlimo post y normalizar
            $href = $data->attr('href');
            
            // Normalizar url
            $url = new Url($href);
            
            // Disparar el evento para comenzar a obtener los diferentes elemento 
            event(new PostScraped((object) [
                'country_id' => $this->link->newspaper->country->id,
                'province_id' => $this->link->newspaper->province->id,
                'newspaper_id' => $this->link->newspaper->id,
                'url' => $url->normalize($this->link->newspaper->website),
                'url_hash' => $url->getHash(),
                'xpath' => $this->link->newspaper->scraper
            ]));
        }
    }
}
