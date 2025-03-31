<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMuscular extends Model
{
    use HasFactory;

    protected $table = 'grupos_musculares';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function ejercicios()
    {
        return $this->hasMany(Ejercicio::class, 'grupo_muscular_id');
    }
}
