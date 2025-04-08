<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('excercise_users', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->string('duration');
            $table->integer('reps');
            $table->foreignId('user_id')->constrained('users');
            
            // Cambio clave aquí: usar unsignedBigInteger + nombre correcto de referencia
            $table->unsignedBigInteger('excersice_id'); // Nota: "excersice" con una "c" para coincidir
            
            $table->timestamps();
        });

        // Añadir la relación FK después de crear la tabla
        Schema::table('excercise_users', function (Blueprint $table) {
            $table->foreign('excersice_id')
                  ->references('id')
                  ->on('excersices') // Nombre exacto de tu tabla existente
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excercise_users');
    }
};