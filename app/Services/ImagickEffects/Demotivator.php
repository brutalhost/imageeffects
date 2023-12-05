<?php

namespace App\Services\ImagickEffects;

use Imagick;
use ImagickDraw;
use ImagickPixel;

class Demotivator extends AbstractImagickEffect
{
    public $params = [
        'header' => 'My header',
        'subtitle' => 'My subtitle',
        'header_size' => 50,
        'subtitle_size' => 50,
    ];

    public $rules = [
        'header' => 'string|nullable|min:0|max:255',
        'subtitle' => 'string|nullable|min:0|max:255',
        'header_size'  => 'integer|required|min:0|max:100',
        'subtitle_size'  => 'integer|required|min:0|max:100',
    ];

    public function processImage(Imagick $imagick, array $params)
    {
        $strings = [
            'header', 'subtitle',
        ];

        $imagick->setImageBackgroundColor('black');

        // First black border
        $imagick->frameimage('black', 3, 3, 0, 0
        );
        // White 1px border
        $imagick->frameimage('white', 1, 1, 0, 0
        );
        // Black margins
        $imagick->frameimage('black', 20, 20, 0, 0);

        foreach ($strings as $string) {
            if (isset($params[$string])) {
                $size = $params[$string.'_size'];
                $blockHeight = ($string === 'subtitle') ? $size - 17.5 : $size;

                // Увеличение размеров изображения с пространством под текст
                $imagick->extentImage($imagick->getImageWidth(), $imagick->getImageHeight() + $blockHeight / 1.2, 0, 0);

                $draw = new ImagickDraw();
                $draw->setFontSize($blockHeight / 1.8);
                $draw->setFillColor('white');
                $textX = $imagick->getImageWidth() / 2;
                $textY = $imagick->getImageHeight() - ($blockHeight / 2.1);
                if ($string === 'subtitle') $textY = $textY - 5;
                $draw->setTextAlignment(Imagick::ALIGN_CENTER);
                $imagick->annotateImage($draw, $textX, $textY, 0, $params[$string]);
            }
        }
    }
}
