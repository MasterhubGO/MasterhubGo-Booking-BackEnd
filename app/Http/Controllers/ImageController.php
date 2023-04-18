<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageController extends Controller
{
    // Check if image exists, then compress it until it became =< 5mb.
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());


            if ($img->width() > 1920 || $img->height() > 1080) {
                $img->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            if ($image->getClientOriginalExtension() !== 'webp') {
                $img = $img->encode('webp');
                $filename = time() . '.webp';
            }


            $img->save(storage_path('app/public/images/' . $filename));
        }
    }
}