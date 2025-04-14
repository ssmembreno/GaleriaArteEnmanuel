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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('tecnica')->nullable();
            $table->decimal('precio',10,2);
            $table->string('tamaño')->nullable();
            $table->string('estado')->nullable();
            $table->string('imagen')->nullable();
            $table->foreignId('artista_id')->constrained('artistas')->onDelete('cascade');
            $table->foreignId('tipo_obra_id')->nullable()->constrained('tipo_obras')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
