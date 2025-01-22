<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CursoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $cursos = array_map(function () use ($faker) {
            return [
                'nombre' => $faker->sentence(3),
                'descripcion' => $faker->paragraph(),
                'duracion' => $faker->numberBetween(1, 52),
                'id_temporada' => $faker->numberBetween(1, 3), // Supongamos que tienes 3 temporadas
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 3)); // Generar 3 cursos

        DB::table('cursos')->insert($cursos);
    }
}
