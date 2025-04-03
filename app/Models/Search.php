<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    // Campos que pueden ser asignados de manera masiva
    protected $fillable = ['search_term'];
}
