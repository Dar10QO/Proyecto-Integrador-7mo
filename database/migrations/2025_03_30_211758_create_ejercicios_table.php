<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('categoria'); // "tren superior" o "tren inferior"
            $table->foreignId('grupo_muscular_id')
                  ->constrained('grupos_musculares')
                  ->onDelete('cascade'); // Clave foránea
            $table->string('ruta_imagen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ejercicios');
    }
};
