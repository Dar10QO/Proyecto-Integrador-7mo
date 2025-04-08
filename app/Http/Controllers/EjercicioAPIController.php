<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\GrupoMuscular;

class EjercicioAPIController extends Controller
{
    private $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = env('FASTAPI_URL', 'http://localhost:8000/api');
    }

    /**
     * Muestra la vista de ejercicios a través de la API
     */
    public function index(Request $request)
    {
        try {
            // Obtener grupos musculares de la base de datos de Laravel
            $gruposMusculares = GrupoMuscular::all();

            // Construir la URL para la API con el filtro si existe
            $url = $this->apiBaseUrl . '/ejercicios/';
            $params = [];

            if ($request->has('grupo_muscular_id') && $request->grupo_muscular_id) {
                $params['grupo_muscular_id'] = $request->grupo_muscular_id;
            }

            // Realizar la petición a la API
            $response = Http::get($url, $params);

            if ($response->failed()) {
                throw new \Exception('Error al conectar con la API: ' . $response->body());
            }

            $ejercicios = $response->json();

            // Renderizar la vista con los datos obtenidos
            return view('ejerciciosAPI.index', compact('ejercicios', 'gruposMusculares'));
        } catch (\Exception $e) {
            return view('ejerciciosAPI.index', [
                'error' => 'Error al obtener datos de la API: ' . $e->getMessage(),
                'ejercicios' => [],
                'gruposMusculares' => $gruposMusculares ?? []
            ]);
        }
    }

    /**
     * Muestra un solo ejercicio
     */
    public function show($id)
    {
        try {
            $url = $this->apiBaseUrl . '/ejercicios/' . $id;
            $response = Http::get($url);

            if ($response->failed()) {
                throw new \Exception('Error al conectar con la API: ' . $response->body());
            }

            $ejercicio = $response->json();

            return view('ejerciciosAPI.show', compact('ejercicio'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al obtener el ejercicio: ' . $e->getMessage());
        }
    }
}
