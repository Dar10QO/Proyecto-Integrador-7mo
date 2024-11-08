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
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
        ]);
    
        $usuario = $request->input('nombre');
    
        // Almacena el mensaje de éxito en la sesión
        session()->flash('exito', 'Se guardó el usuario: ' . $usuario);
    
        // Redirige a la vista 'perfil.index' para que se muestre el mensaje
        return to_route('perfil.index');
    }
    

}
