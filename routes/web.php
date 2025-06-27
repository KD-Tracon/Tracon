<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
Route::get ('/', [VideoController::class, 'form'])->name('video.form');
Route::post('/', [VideoController::class, 'store'])->name('video.store');
