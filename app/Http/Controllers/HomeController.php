<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $counter = $request->session()->get('counter', 0);
        return view('pages.home', compact('counter'));
    }
}
