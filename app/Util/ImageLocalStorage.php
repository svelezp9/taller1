<?php

namespace App\Util;

use App\Interfaces\ImageStorage;

use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store($request, $imgName)
    {
        if ($request->hasFile('imgName')) {
            Storage::disk('public')->put(
                $imgName,
                file_get_contents($request->file('imgName')->getRealPath())
            );
        }
    }
}
