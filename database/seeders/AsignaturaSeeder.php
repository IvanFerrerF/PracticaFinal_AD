<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AsignaturaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $asignaturas = array_map(function () use ($faker) {
            return [
                'nombre' => $faker->words(2, true),
                'curso_id' => $faker->numberBetween(1, 3), // Supongamos que hay 3 cursos
                'profesor_id' => $faker->numberBetween(1, 5), // Supongamos que hay 5 profesores
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 15)); // Generar 15 asignaturas

        DB::table('asignaturas')->insert($asignaturas);
    }
}
