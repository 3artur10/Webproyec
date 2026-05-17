<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sacramentos', function (Blueprint $table) {
            $table->id(); // Clave primaria [cite: 32]
            $table->string('nombre'); 
            $table->timestamps(); // Timestamps obligatorios [cite: 35]
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sacramentos');
    }
};