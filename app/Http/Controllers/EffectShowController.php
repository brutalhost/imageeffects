<?php

namespace App\Http\Controllers;

use App\Models\Effect;
use App\Services\ImagickEffects\AbstractImagickEffect;
use Illuminate\Http\Request;

class EffectShowController extends Controller
{
    protected Effect                $effect;
    protected AbstractImagickEffect $imagickEffect;

    public $params = [];

    public function show(Request $request, Effect $effect)
    {
        $this->initHtmxVariables();
        $this->initImageHelpers();

        $this->effect        = $effect;
        $this->imagickEffect = $effect->getImagickEffectInstance();

        if ($this->sessionHelper->hasImage) {
            return $this->showImageEffectForm($request);
        } else {
            return $this->showImageLoader();
        }
    }

    public function showImageLoader()
    {
        return view('pages.effect-show', [
            'effect' => $this->effect,
        ]);
    }

    public function showImageEffectForm(Request $request)
    {
        if ($request->all()) {
            $validated = $this->validate($request, $this->imagickEffect->rules);
            if ($validated) {
                $this->params = $validated + $this->imagickEffect->params;
                $this->processImage();
            }
        } else { // First render when user loaded image
            $this->params = $this->imagickEffect->params;
            $this->processImage();
        }

        return view('pages.effect-show', [
            'effect' => $this->effect,
            'params' => $this->params,
        ]);
    }

    public function processImage()
    {
        if (!$this->sessionHelper->equalSessionParams($this->params)) {
            $this->sessionHelper->imagickProcessAndSave(function ($imagick) {
                $this->imagickEffect->processImage($imagick, $this->params);
            });
        }
    }
}
