<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RutinasController;


Route::middleware('auth')->group(function () {
    Route::get('/rutinasgratis', [RutinasController::class, 'rutinasgratis'])->name('rutinasgratis');
});

require __DIR__.'/auth.php';
