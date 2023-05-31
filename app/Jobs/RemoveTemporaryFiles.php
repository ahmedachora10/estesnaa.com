<?php

namespace App\Jobs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RemoveTemporaryFiles
{

    public function __invoke()
    {
        $temporaryFiles = File::files(storage_path('app/livewire-tmp'));

        Storage::put(storage_path('app/tests.txt'), 'Cron job running!');

        foreach ($temporaryFiles as $file) {
            File::delete($file);
        }
    }
}
