<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('searches', function (Blueprint $table) {
        $table->id();
        $table->string('search_term');  // Término de búsqueda
        $table->timestamps();  // Para registrar cuándo se hizo la búsqueda
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('searches');
    }
};
