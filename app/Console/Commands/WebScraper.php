<?php

namespace App\Console\Commands;

use App\Link;
use App\Events\ScraperLink;
use Illuminate\Console\Command;

class WebScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:link {id?}';

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
        $linkId = $this->argument('id');

        if (is_null($linkId)) {
            $links = Link::where('active', true)->get();
        } else {
            $links = Link::where([
                'id' => $linkId,
                'active' => true,
            ])->get();
        }

        $this->info("\nScraping...\n");

        foreach ($links as $link) {
            $this->line($link->url);
            event(new ScraperLink($link));
        }

        $this->info("\nFinish.\n");
    }
}
