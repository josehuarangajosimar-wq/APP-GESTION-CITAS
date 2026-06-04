<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicamento_tratamiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tratamiento_id')->constrained('tratamientos')->cascadeOnDelete();
            $table->foreignId('medicamento_id')->constrained('medicamentos')->cascadeOnDelete();
            $table->string('dosis', 100);
            $table->string('frecuencia', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicamento_tratamiento');
    }
};