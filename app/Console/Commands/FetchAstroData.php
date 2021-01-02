<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchAstroData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fetchAstroData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch astro data from website';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
