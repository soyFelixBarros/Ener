<?php

namespace App\Console\Commands;

use App\Link;
use App\Events\Scraping;
use Illuminate\Console\Command;

class WebScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:web';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Raspar las páginas web';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $links = Link::where('active', true)->get();

        $this->line("\n Scraping...\n");

        foreach ($links as $link) {
            event(new Scraping($link));
        }

        $this->info("\n\n Finish.\n");
    }
}
