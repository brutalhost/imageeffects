<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Imagick;

class SessionHelper
{
    public bool       $hasImage = false;
    public Image|null $image    = null;

    public function __construct()
    {
        $hasSessionImage = Session::has('image');

        if ($hasSessionImage) {
            $sessionImageObject = Session::get('image');
            if ($sessionImageObject->exists()) {
                $this->hasImage = true;
                $this->image    = $sessionImageObject;
            } else {
                $sessionImageObject->delete();
                Session::remove('image');
            }
        }
    }

    public function imagickProcessAndSave(callable $callback = null, bool $cropImage = true)
    {
        if ($this->hasImage) {
            $image = $this->image;
            $path = Storage::path('originals/'.$image->filename);
            $savePath = Storage::path('public/temp/'.$image->filename);
            app('image-storage')->processAndStoreImage($path, $savePath,
            function(Imagick $imagick) use ($callback, $cropImage) {
                if(isset($callback)) {
                    $callback($imagick);
                }
                if ($cropImage === true) {
                    $imagick->scaleImage(640,640, true);
                }
            });
            $image->touch();
        }
    }

    public function deleteImage()
    {
        if ($this->hasImage) {
            $this->image->delete();
            session()->remove('image');
            session()->remove('params');
        }
    }

    public function equalSessionParams($params) {
        $sessionParams = session('params');
        if (isset($sessionParams) && $params === $sessionParams && $sessionParams['image'] === $this->image) {
            return true;
        }
        $params['image'] = $this->image;
        session()->put('params', $params);
        return false;
    }
}
