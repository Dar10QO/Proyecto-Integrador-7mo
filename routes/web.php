<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Models\Search;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\EjercicioAPIController;

Route::get('/food/search', [FoodController::class, 'search'])->name('food.search');
Route::get('/food/{fdcId}', [FoodController::class, 'show'])->name('food.show');
Route::get('/ejercicios', [EjercicioController::class, 'index'])->name('ejercicios.index');
Route::get('/ejercicios/{id}', [EjercicioController::class, 'show'])->name('ejercicios.show');
Route::get('/ejercicios-api', [EjercicioAPIController::class, 'index'])->name('ejercicios.api.index');
Route::get('/ejercicios-api/{id}', [EjercicioAPIController::class, 'show'])->name('ejercicios.api.show');
use App\Http\Controllers\EntrenadorController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/search/history', function () {
    $searches = Search::all();  // Obtener todas las búsquedas almacenadas
    return view('food.history', compact('searches'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/entrenador', [EntrenadorController::class, 'index'])
    ->name('entrenador.index')
    ->middleware(['auth', 'verified']);
});

require __DIR__.'/auth.php';
require __DIR__.'/rutasDario.php';
require __DIR__.'/rutasJosue.php';
require __DIR__.'/rutasChris.php';
require __DIR__.'/rutasGera.php';
require __DIR__.'/rutasLuis.php';
require __DIR__.'/rutasDani.php';
