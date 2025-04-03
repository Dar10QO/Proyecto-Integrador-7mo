<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Search;

class FoodController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return view('food.search', ['foods' => []]);
        }

        $apiKey = config('services.usda.api_key');
        $url = config('services.usda.base_url') . "foods/search";

        $response = Http::get($url, [
            'query' => $query,
            'api_key' => $apiKey,
        ]);

        $foods = $response->json()['foods'] ?? [];

        return view('food/search', compact('foods'));

    }

    public function show($fdcId)
    {
    $apiKey = config('services.usda.api_key');
    $url = "https://api.nal.usda.gov/fdc/v1/food/{$fdcId}?api_key={$apiKey}";

    $response = Http::get($url);
    $food = $response->json();

    // Verificamos que 'foodNutrients' esté disponible
    if (!isset($food['foodNutrients']) || !is_array($food['foodNutrients'])) {
        $food['foodNutrients'] = [];
    }

    return view('food.show', compact('food'));
    }

    public function index(Request $request)
    {
    // Obtener el término de búsqueda ingresado por el usuario
    $query = $request->input('query', '');

    // Guardar la búsqueda en la base de datos
    Search::create(['search_term' => $query]);

    // Aquí va el código para realizar la búsqueda en la API de USDA (como ya lo tienes)
    $apiKey = config('services.usda.api_key');
    $url = "https://api.nal.usda.gov/fdc/v1/foods/search?query={$query}&api_key={$apiKey}&pageSize=10&page=1";
    $response = Http::get($url);
    $foods = $response->json();

    // Paginamos los resultados
    $foods = collect($foods['foods'])->paginate(10);

    return view('food.index', compact('foods'));
    }
}
