<?php

// In ObjetivosUController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserObjetive;

class ObjetivosUController extends Controller  // Changed from ObjetivosU to ObjetivosUController
{
    public function index()
    {
        $objetivos = UserObjetive::where('user_id', auth()->id())->get();
        return view('users.index', compact('objetivos'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'objetivo' => 'required|string|max:255',
        ]);

        UserObjetive::create([
            'objetive' => $validateData['objetivo'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('ObjetivosU.index')->with('success', 'Objetivo guardado exitosamente.');
    }

    public function destroy($id)
    {
        $objetivo = UserObjetive::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        $objetivo->delete();

        return redirect()->route('ObjetivosU.index')->with('success', 'Objetivo eliminado exitosamente.');
    }
}