<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EstudianteSeeder::class,
            ProfesorSeeder::class,
            TemporadaSeeder::class,
            CursoSeeder::class,
            AsignaturaSeeder::class,
            MatriculaSeeder::class,
            EvaluacionSeeder::class,
            CursoEstudianteSeeder::class,
        ]);
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
