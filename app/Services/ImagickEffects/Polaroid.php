<?php

namespace App\Services\ImagickEffects;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Imagick;
use ImagickDraw;
use ImagickPixel;

class Polaroid extends AbstractImagickEffect
{
    public $params = [
        'angle' => 360,
    ];

    public $rules = [
        'angle' => 'integer|required|min:1|max:360',
    ];

    public function processImage(Imagick $imagick, array $params)
    {
        $imagick->setBackgroundColor('white');
        $draw = new ImagickDraw();
        $imagick->polaroidImage($draw, $params['angle']);
        $imagick->setBackgroundColor(new ImagickPixel('transparent'));
    }
}
