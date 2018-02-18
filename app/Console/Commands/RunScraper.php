<?php

namespace App\Console\Commands;

use App\Link;
use App\Events\PageScraping;
use Illuminate\Console\Command;

class RunScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Correr raspador';

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

        $this->line("\n Scraping web pages.\n");

        foreach ($links as $link) {
            event(new PageScraping($link));
        }

        $this->info("\n\n Finish.\n");
    }
}
