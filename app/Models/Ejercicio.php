<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicios';
    protected $fillable = ['nombre', 'descripcion', 'categoria', 'grupo_muscular_id', 'ruta_imagen'];

    public function grupoMuscular()
    {
        return $this->belongsTo(GrupoMuscular::class, 'grupo_muscular_id');
    }
}
