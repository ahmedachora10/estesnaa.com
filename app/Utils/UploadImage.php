<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;

trait UploadImage {
    private function removeImage($image)
    {
        $image = str_replace('storage', 'public', $image);

        if(Storage::exists($image)) {
            return Storage::delete($image);
        }

        return false;
    }


    private function saveImage($image, $folder = 'all')
    {
        $image_full_path = $image->storeAs('public/images/'.$folder, date('Y-m-d') . auth()->id() . str()->random(8) . '.' . $image->extension());

        return ['image' => str_replace('public', 'storage', $image_full_path)];
    }
}