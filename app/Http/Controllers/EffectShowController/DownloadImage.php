<?php

namespace App\Http\Controllers\EffectShowController;

use App\Http\Controllers\Controller;
use App\Models\Effect;
use App\Services\ImageStorage;
use App\Services\SessionHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadImage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        Request $request,
        Effect $effect,
        SessionHelper $sessionImageHelper,
        ImageStorage $imageStorage
    ) {
        if (session()->has('params')) {
            $params        = session()->get('params');
            $imagickEffect = $effect->getImagickEffectInstance();
            $sessionImageHelper->imagickProcessAndSave(function ($imagick) use ($imagickEffect, $params,) {
                $imagickEffect->processImage($imagick, $params);
            }, false);
            return response()->download(Storage::path('public/temp/'.$sessionImageHelper->image->filename));
        }
        return redirect()->back();
    }
}
