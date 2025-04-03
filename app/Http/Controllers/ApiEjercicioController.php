<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class ApiEjercicioController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        // URL base de la API (definida en .env)
        $this->apiUrl = env('FASTAPI_URL', 'http://localhost:8000');
    }

    public function index(Request $request)
    {
        try {
            // Intentar obtener los grupos musculares
            $gruposMusculares = Http::timeout(5)->get($this->apiUrl . '/api/grupos-musculares')->json();

            $params = [];
            if ($request->has('grupo_muscular_id') && $request->grupo_muscular_id != '') {
                $params['grupo_muscular_id'] = $request->grupo_muscular_id;
            }

            // Intentar obtener los ejercicios
            $ejercicios = Http::timeout(5)->get($this->apiUrl . '/api/ejercicios', $params)->json();

            return view('ejerciciosAPI.index', compact('ejercicios', 'gruposMusculares'));
        } catch (Exception $e) {
            // Manejar el error si la API no está disponible
            return view('ejerciciosAPI.error', [
                'message' => 'No se pudo conectar con la API de ejercicios. Asegúrate de que la API esté en ejecución.',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        try {
            // Obtener detalles de un ejercicio específico
            $ejercicio = Http::timeout(5)->get($this->apiUrl . '/api/ejercicios/' . $id)->json();

            return view('ejerciciosAPI.show', compact('ejercicio'));
        } catch (Exception $e) {
            return view('ejerciciosAPI.error', [
                'message' => 'No se pudo obtener la información del ejercicio desde la API.',
                'error' => $e->getMessage()
            ]);
        }
    }
}
