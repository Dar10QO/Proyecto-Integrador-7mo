<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObjetivosUController;
use App\Http\Controllers\EntrenadorController; // Added this import

Route::middleware('auth')->group(function () {
    Route::get('/objetivos', [ObjetivosUController::class, 'index'])->name('ObjetivosU.index');
    Route::post('/objetivos', [ObjetivosUController::class, 'store'])->name('ObjetivosU.store');
    Route::delete('/objetivos/{id}', [ObjetivosUController::class, 'destroy'])->name('ObjetivosU.destroy');
});

// Consolidated entrenador routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta para mostrar el formulario
    Route::get('/entrenador', [EntrenadorController::class, 'index'])->name('entrenador.index');
    
    // Ruta para procesar el formulario
    Route::post('/entrenador/contacto', [EntrenadorController::class, 'contact'])->name('entrenador.contact');
    
    // ... otras rutas que necesiten auth+verified
});

require __DIR__.'/auth.php';