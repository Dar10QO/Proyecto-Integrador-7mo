<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfilController;

Route::middleware('auth')->group(function () {
    //AQUI ADENTRO VAN LAS RUTAS


});
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::get('/membresias', [MembresiasController::class, 'index'])->name('membresias.index');
require __DIR__.'/auth.php';
