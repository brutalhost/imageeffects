<?php

namespace App\Http\Controllers;

use App\Services\ImageStorage;
use App\Services\SessionHelper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // initHtmxVariables
    public bool $isHxBoosted;
    public bool $isHxRequest;

    // initImageHelpers
    public SessionHelper $sessionHelper;
    public ImageStorage  $imageStorage;

    public function initHtmxVariables()
    {
        $this->isHxBoosted = request()->header('hx-boosted') ? true : false;
        $this->isHxRequest = request()->header('hx-request') ? true : false;
    }

    public function initImageHelpers()
    {
        $this->sessionHelper = app('session-helper');
        $this->imageStorage  = app('image-storage');
        view()->share('hasImage', $this->sessionHelper->hasImage);
    }
}
