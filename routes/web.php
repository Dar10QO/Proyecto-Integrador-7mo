<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Models\Search;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\ApiEjercicioController;

Route::get('/food/search', [FoodController::class, 'search'])->name('food.search');
Route::get('/food/{fdcId}', [FoodController::class, 'show'])->name('food.show');
Route::get('/ejercicios', [EjercicioController::class, 'index'])->name('ejercicios.index');
Route::get('/ejercicios/{id}', [EjercicioController::class, 'show'])->name('ejercicios.show');
Route::prefix('api-ejercicios')->group(function () {
    Route::get('/', [ApiEjercicioController::class, 'index'])->name('api.ejercicios.index');
    Route::get('/{id}', [ApiEjercicioController::class, 'show'])->name('api.ejercicios.show');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/search/history', function () {
    $searches = Search::all();  // Obtener todas las búsquedas almacenadas
    return view('food.history', compact('searches'));
});

// Añadí esta ruta para que se pueda acceder a la vista de login
Route::get('/sesion', function () {// No la nombre login porque me da error
    return view('login');
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
