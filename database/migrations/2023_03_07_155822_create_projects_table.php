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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titolo del progetto
            $table->text('description')->nullable(); // Descrizione del progetto
            $table->string('image')->nullable(); // URL assoluto a un immagine del progetto
            $table->string('url')->nullable(); // URL assoluto che rimandi al mio GitHub
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
