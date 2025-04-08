<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcersiceType;

class ExcersiceController extends Controller
{
    public function create()
    {
        // $excerciseTypes = ExcersiceType::all();
        // return view('excercise.create_excersice', compact('excerciseTypes'));

        return view('excercise.create_excersice');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            // 'id'=>'required|integer',
        ]);

        // dd($validateData);

        ExcersiceType::create([
            'name'=>$validateData['name'],
            // 'id'=>$validateData['id'],
        ]);

        // $excercise = ExcersiceType::all();

        return back();
    }
}
