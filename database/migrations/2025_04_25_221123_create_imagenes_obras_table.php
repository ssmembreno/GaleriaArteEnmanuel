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
        Schema::create('imagenes_obras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obra_id');
            $table->string('ruta_imagen');
            $table->integer('orden');
            $table->foreign('obra_id')->references('id')->on('obras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes_obras');
    }
};
