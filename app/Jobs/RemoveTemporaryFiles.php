<?php

namespace App\Jobs;
use Illuminate\Support\Facades\File;

class RemoveTemporaryFiles
{

    public function __invoke()
    {
        $temporaryFiles = File::files(storage_path('app/livewire-tmp'));

        foreach ($temporaryFiles as $file) {
            File::delete($file);
        }
    }
}