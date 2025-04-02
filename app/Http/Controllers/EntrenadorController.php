<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EntrenadorContacto;

class EntrenadorController extends Controller
{
    public function index()
    {
        return view('entrenador.index');
    }
    public function contact(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email',
            'objetivo' => 'required|string'
        ]);

        // Aquí puedes guardar en la base de datos o enviar un email
        // Ejemplo de envío de email:
        // Mail::to('entrenador@example.com')->send(new EntrenadorContacto($request->all()));

        return back()->with('exito', 'Tu mensaje ha sido enviado. Nos pondremos en contacto contigo pronto.');
    }
}