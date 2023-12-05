<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Imagick;

class ImageStorage
{
    /**
     * Process and store an image.
     *
     * @param string    $imagePath              The path of the image to be processed.
     * @param string    $newImagePath           The path where the processed image should be stored.
     * @param callable  $processImagickCallback A callback function to process the image using Imagick.
     * @return void
     */
    public function processAndStoreImage(string $imagePath, string $newImagePath, ?callable $processImagickCallback = null): void
    {
        $imagick         = new Imagick($imagePath);

        if ($processImagickCallback !== null && is_callable($processImagickCallback)) {
            $processImagickCallback($imagick);
        }

        $imagick->writeImage($newImagePath);
    }

    public function saveImageFromRequest(UploadedFile $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filename  = uniqid().'.'.$extension;
        $image->storeAs('originals', $filename);

        $image           = new Image();
        $image->filename = $filename;
        $image->save();

        $this->copyImageToTempDirectory($image);

        Session::put('image', $image);
        return $image;
    }

    public function copyImageToTempDirectory(Image $image)
    {
        $originalImagePath = Storage::path('originals/'.$image->filename);
        $tempImagePath     = Storage::path('public/temp/'.$image->filename);

        $newImage = new Imagick($originalImagePath);
        $newImage->thumbnailImage(500, 500, true);
        $newImage->writeImage($tempImagePath);
    }
}
