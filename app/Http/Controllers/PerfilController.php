<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        return view('perfil.index');
    }
    public function contact(Request $request)
    {
        $validate = $request->validate([
            'nombre'=>'required',
            'telefono'=>'required',
            'email'=>'required',
        ]);

        $usuario = $peticion->input('nombre');

        session()->flash('exito', 'Se guardo el usuario: '.$usuario);

        return to_route('perfil.index');
    }

}
