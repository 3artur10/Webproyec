<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sacramento;

class SacramentoSeeder extends Seeder
{
    public function run(): void
    {
        // Esto insertará los datos necesarios para tu proyecto
        Sacramento::create(['nombre' => 'Bautismo']);
        Sacramento::create(['nombre' => 'Primera Comunión']);
        Sacramento::create(['nombre' => 'Confirmación']);
        Sacramento::create(['nombre' => 'Matrimonio']);
    }
}