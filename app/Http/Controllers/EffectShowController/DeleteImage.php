<?php

namespace App\Http\Controllers\EffectShowController;

use App\Http\Controllers\Controller;
use App\Services\SessionHelper;
use Illuminate\Http\Request;

class DeleteImage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, SessionHelper $sessionImageHelper)
    {
        $sessionImageHelper->deleteImage();
        return redirect()->back();
    }
}
