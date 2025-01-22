<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EstudianteSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $estudiantes = array_map(function () use ($faker) {
            return [
                'nombre' => $faker->firstName(),
                'apellidos' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'telefono' => $faker->phoneNumber(),
                'fecha_nacimiento' => $faker->date('Y-m-d', '-18 years'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 10)); // Generar 10 estudiantes

        DB::table('estudiantes')->insert($estudiantes);
    }
}
