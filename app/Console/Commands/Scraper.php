<?php

namespace App\Console\Commands;

use App\Link;
use App\Events\Scraping;
use Illuminate\Console\Command;

class Scraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Raspador web';

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
            event(new Scraping($link));
        }

        $this->info("\n\n Finish.\n");
    }
}
