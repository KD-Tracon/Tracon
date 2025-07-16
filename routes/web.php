<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ResultController;

Route::get('/', [VideoController::class, 'form'])->name('video.form');
Route::post('/upload', [VideoController::class, 'store'])->name('video.store');

// 確認用ルート（仮）
Route::get('/uploadnow', function () {
    return view('uploadnow');
})->name('uploadnow');
// 確認用ルート（仮）
Route::get('/menu', function () {
    return view('menu');
})->name('menu');



// メニュー画面（分析結果一覧）
// Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// 分析結果の表示（result.blade.php用）
Route::get('/result/{id}', [ResultController::class, 'show'])->name('result.show');
