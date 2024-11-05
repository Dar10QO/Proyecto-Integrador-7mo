<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RutinasController;
use App\Http\Controllers\EjerciciosPController;


Route::middleware('auth')->group(function () {
    Route::get('/rutinasgratis', [RutinasController::class, 'rutinasgratis'])->name('rutinasgratis');
    
});
// Route::get('/ejerciciospremium', [RutinasController::class, 'ejerciciosp'])->name('ejerciciosp');

Route::get('/ejerciciospremium', function () {
    return view('ejerciciospremium');
})->name('ejerciciospremium');


Route::get('/tipos', function () {
    return view('tipos');
})->name('tipos');


Route::get('/perfilusuario', function () {
    return view('perfilusuario');
})->name('perfilusuario');
