<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RemoveTemporaryFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tmpfiles:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Temporary Files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $temporaryFiles = File::files(storage_path('app/livewire-tmp'));

        foreach ($temporaryFiles as $file) {
            File::delete($file);
        }
        $this->info('Temporary files deleted');
        return Command::SUCCESS;
    }
}