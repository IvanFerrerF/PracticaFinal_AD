<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MatriculaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $matriculas = array_map(function () use ($faker) {
            return [
                'estudiante_id' => $faker->numberBetween(1, 10), // Supongamos 10 estudiantes
                'curso_id' => $faker->numberBetween(1, 3), // Supongamos 3 cursos
                'fecha_matricula' => $faker->date('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 20)); // Generar 20 matrículas

        DB::table('matriculas')->insert($matriculas);
    }
}
