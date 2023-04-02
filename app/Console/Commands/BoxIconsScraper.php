<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BoxIconsScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boxicons:scrape';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape the BoxIcons website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}