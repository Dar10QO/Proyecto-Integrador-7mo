<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    //AQUI ADENTRO VAN LAS RUTAS
});

require __DIR__.'/auth.php';
