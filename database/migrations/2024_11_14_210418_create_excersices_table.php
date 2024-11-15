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
        Schema::create('excersices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('muscular-group');
            $table->string('description');
            $table->foreignId('excersice_types_id')->constrained('excersice_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excersices');
    }
};
