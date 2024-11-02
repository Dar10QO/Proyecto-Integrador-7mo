<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RutinasController extends Controller
{
    public function rutinasgratis()
    {
        return view('vistasjosu.rutinasgratis');
    }

    public function ejerciciosp(){

        return view('ejerciciospremium');
    }
}
