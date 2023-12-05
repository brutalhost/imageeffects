<?php

namespace App\Services\ImagickEffects;

use Imagick;

abstract class AbstractImagickEffect
{
    public $params;
    public $rules;

    public abstract function processImage(Imagick $imagick, array $params);
}
