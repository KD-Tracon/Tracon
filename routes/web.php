<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ResultController;

// ✅ TOPページ = メニュー画面
Route::get('/', [MenuController::class, 'index'])->name('menu');

// ✅ アップロード画面（form表示）
Route::get('/upload', [VideoController::class, 'form'])->name('video.form');

// ✅ アップロード処理（POST）
Route::post('/upload', [VideoController::class, 'store'])->name('video.store');

// ✅ アップロード中（進捗表示用仮画面）
Route::get('/uploadnow', function () {
    return view('uploadnow');
})->name('uploadnow');

//データベースがまだなのでresultをそのまま表示
Route::get('/result', [ResultController::class, 'show'])->name('result.show');

// ✅ 分析結果ページ
// Route::get('/result/{id}', [ResultController::class, 'show'])->name('result.show');
