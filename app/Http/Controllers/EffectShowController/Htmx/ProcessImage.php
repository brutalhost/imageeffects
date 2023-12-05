<?php

namespace App\Http\Controllers\EffectShowController\Htmx;

use App\Http\Controllers\Controller;
use App\Models\Effect;
use App\Services\SessionHelper;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProcessImage extends Controller
{
    public function __invoke(Request $request, Effect $effect, SessionHelper $sessionHelper)
    {
        $imagickEffect = $effect->getImagickEffectInstance();

        try {
            $validated = $request->validate($imagickEffect->rules);
        } catch (ValidationException $e) {
            return response("Toastify({ text: '".$e->getMessage()."', duration: 3000, gravity: 'bottom' }).showToast();")
                ->header('Hx-Reswap', 'none');
        }

        if (!$sessionHelper->equalSessionParams($validated)) {
            $sessionHelper->imagickProcessAndSave(function ($imagick) use ($imagickEffect, $validated) {
                $imagickEffect->processImage($imagick, $validated);
            });
        }
        return response()->view('partials.preview-image')->header('Hx-Retarget', '#preview-img');
    }
}
