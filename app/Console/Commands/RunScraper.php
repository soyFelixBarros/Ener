<?php

namespace App\Console\Commands;

use App\Link;
use App\Jobs\ProcessPost;
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
        $count = count($links);
        
        $this->line("\n Scraping ${count} web pages:\n");

        $bar = $this->output->createProgressBar($count); 
        
        foreach ($links as $link) {
            // Cambiar el estado del enlace
            $link->update(['scraping' => true]);

            ProcessPost::dispatch($link);
            
            // Cambiar el estado del enlace
            $link->update(['scraping' => false]);

            $bar->advance();
        }
        $bar->finish();

        $this->info("\n\n Finish.\n");
    }
}
