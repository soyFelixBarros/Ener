<?php

namespace App\Console\Commands;

use App\Subscriber;
use App\Mail\Report;
use Illuminate\Console\Command;

class SendReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reports to an subscribers';

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
        $subscribers = Subscriber::all();

        $this->output->progressStart(count($subscribers));

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Report);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();

        $this->line('Send '.count($subscribers).' reports to an subscribers');
    }
}
