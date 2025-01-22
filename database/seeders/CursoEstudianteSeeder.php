<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CursoEstudianteSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $cursoEstudiantes = array_map(function () use ($faker) {
            return [
                'curso_id' => $faker->numberBetween(1, 3), // Supongamos 3 cursos
                'estudiante_id' => $faker->numberBetween(1, 10), // Supongamos 10 estudiantes
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 20)); // Generar 20 registros en la tabla pivote

        DB::table('curso_estudiante')->insert($cursoEstudiantes);
    }
}
