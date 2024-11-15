<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjerciciosPController extends Controller
{
    public function ejerciciospremium()
    {
        return view('ejerciciospremium');
    }
}
