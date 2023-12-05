<?php

namespace App\Http\Controllers;

use App\Models\Effect;
use App\Services\ImageStorage;
use App\Services\SessionHelper;
use Illuminate\Http\Request;

class EffectListController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $effects = Effect::all();
        return view('pages.effect-list', ['effects' => $effects]);
    }
}
