<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    
    public function run(): void
    {
        \App\Models\User::factory()->create([
        'name' => 'Administrador Parroquia',
        'email' => 'admin@parroquia.com',
        'password' => bcrypt('password123'), // Esta será tu contraseña
    ]);

    $this->call([
        SacramentoSeeder::class,
    ]);
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
