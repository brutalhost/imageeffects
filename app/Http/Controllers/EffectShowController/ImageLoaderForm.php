<?php

namespace App\Http\Controllers\EffectShowController;

use App\Http\Controllers\Controller;
use App\Models\Effect;
use App\Services\ImageStorage;
use App\Services\SessionHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageLoaderForm extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ImageStorage $imageStorage, SessionHelper $sessionHelper)
    {
        $vaidated = $this->validate($request, [
            'inputImage' => 'required|image|max:1024',
        ]);

        $sessionHelper->deleteImage();
        $validatedImage = $request->file('inputImage');
        $imageStorage->saveImageFromRequest($validatedImage);

        $sessionHelper->imagickProcessAndSave();

        return redirect()->back();
    }
}
