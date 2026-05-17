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
        Schema::create('configuracions', function (Blueprint $table) {
            $table->id();
            
            // Textos Informativos Principales
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('lugar');
            
            // Almacenamiento de Archivos y Enlaces Geográficos
            $table->string('imagen')->nullable(); // Guarda la ruta de la foto de portada de la parroquia
            $table->text('ubicacion_mapa')->nullable(); // Guarda el enlace largo embebido o directo de Google Maps
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracions');
    }
};