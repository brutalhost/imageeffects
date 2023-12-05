<?php

use App\Http\Controllers\EffectListController;
use App\Http\Controllers\EffectShowController;
use App\Http\Controllers\EffectShowController\DeleteImage;
use App\Http\Controllers\EffectShowController\DownloadImage;
use App\Http\Controllers\EffectShowController\Htmx\ProcessImage;
use App\Http\Controllers\EffectShowController\ImageLoaderForm;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/effects', EffectListController::class)->name('effects');
Route::match(['GET', 'POST'], '/effects/{effect}', [EffectShowController::class, 'show'])->name('effects.show');

Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::post('upload-image', ImageLoaderForm::class)->name('image-uploader');
    Route::delete('delete-image', DeleteImage::class)->name('delete-image');
    Route::post('{effect}/download-image', DownloadImage::class)->name('downlaod-image');
    Route::post('{effect}/process-image', ProcessImage::class)->name('process-image')->middleware('htmx');
});
