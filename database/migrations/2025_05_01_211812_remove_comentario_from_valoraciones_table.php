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
        Schema::table('valoraciones', function (Blueprint $table) {
            $table->dropColumn('comentario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('valoraciones', function (Blueprint $table) {
            $table->string('comentario');
        });
    }
};
