<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

Route::get('/', [VideoController::class, 'form'])->name('video.form');
Route::post('/upload', [VideoController::class, 'store'])->name('video.store');

// 確認用ルート（仮）
Route::get('/uploadnow', function () {
    return view('uploadnow');
})->name('uploadnow');
