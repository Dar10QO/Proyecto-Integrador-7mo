<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
});

require __DIR__.'/auth.php';
require __DIR__.'/rutasDario.php';
require __DIR__.'/rutasJosue.php';
require __DIR__.'/rutasChris.php';
require __DIR__.'/rutasGera.php';
require __DIR__.'/rutasLuis.php';
require __DIR__.'/rutasDani.php';
