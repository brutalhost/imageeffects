<?php

namespace App\Services\ImagickEffects;

use Imagick;
use ImagickDraw;

class Stencil extends AbstractImagickEffect
{
    public $params = [
        'number_colors'  => 3,
        'max_iterations' => 15,
        'treshold'       => 0,
    ];

    public $rules = [
        'number_colors'  => 'integer|required|min:0|max:36',
        'max_iterations' => 'integer|required|min:1|max:24',
        'treshold'       => 'integer|required|min:0|max:100',
    ];

    public function processImage(Imagick $imagick, array $params)
    {
        if (!empty($params['number_colors']) && !empty($params['max_iterations'])) {
            $imagick->kmeansImage($params['number_colors'], $params['max_iterations'], 1);
        }
        if (!empty($params['treshold'])) {
            $imagick->thresholdImage($params['treshold'] * 0.01 * Imagick::getQuantum());
        }
    }
}
