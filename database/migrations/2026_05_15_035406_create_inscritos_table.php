<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscritos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_joven');
            $table->string('nombre_responsable'); // <-- Agregar esta línea
            $table->string('dui')->unique();
            $table->string('telefono');
            $table->integer('edad');
            $table->foreignId('sacramento_id')->constrained('sacramentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscritos');
    }
};