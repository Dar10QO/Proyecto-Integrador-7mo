<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembresiasController extends Controller
{
    public function index()
    {
        return view('membresias');
    }
}
