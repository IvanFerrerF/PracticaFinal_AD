<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EvaluacionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $evaluaciones = array_map(function () use ($faker) {
            return [
                'estudiante_id' => $faker->numberBetween(1, 10),
                'asignatura_id' => $faker->numberBetween(1, 15),
                'curso_id' => $faker->numberBetween(1, 3),
                'nota' => $faker->randomFloat(2, 0, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 50)); // Generar 50 evaluaciones

        DB::table('evaluaciones')->insert($evaluaciones);
    }
}
