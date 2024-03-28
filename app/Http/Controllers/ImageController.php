<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImageUrl($imageName)
    {
        $imageUrl = asset('images/' . $imageName);

        return response()->json(['image_url' => $imageUrl]);
    }
}
