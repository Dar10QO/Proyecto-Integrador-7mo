<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RutinasController;
use App\Http\Controllers\EjerciciosPController;


Route::middleware('auth')->group(function () {
    Route::get('/rutinasgratis', [RutinasController::class, 'rutinasgratis'])->name('rutinasgratis');
    Route::get('/ejerciciospremium', [RutinasController::class, 'ejerciciosp'])->name('ejerciciosp');
});

require __DIR__.'/auth.php';
