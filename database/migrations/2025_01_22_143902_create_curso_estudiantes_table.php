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
        Schema::create('curso_estudiante', function (Blueprint $table) {
            $table->id(); // Clave primaria de la tabla pivote
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_estudiantes');
    }
};
