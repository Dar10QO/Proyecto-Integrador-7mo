<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\GrupoMuscular;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    public function index(Request $request)
    {
        $gruposMusculares = GrupoMuscular::all();

        $query = Ejercicio::with('grupoMuscular');

        // Filtrar por grupo muscular si se proporciona
        if ($request->has('grupo_muscular_id') && $request->grupo_muscular_id != '') {
            $query->where('grupo_muscular_id', $request->grupo_muscular_id);
        }

        $ejercicios = $query->get();

        return view('ejercicios.index', compact('ejercicios', 'gruposMusculares'));
    }

    public function show($id)
    {
        $ejercicio = Ejercicio::with('grupoMuscular')->findOrFail($id);
        return response()->json($ejercicio);
    }
}
