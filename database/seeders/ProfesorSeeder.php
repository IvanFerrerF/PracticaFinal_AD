<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProfesorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $profesores = array_map(function () use ($faker) {
            return [
                'nombre' => $faker->firstName(),
                'apellidos' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'telefono' => $faker->phoneNumber(),
                'especialidad' => $faker->randomElement(['Matemáticas', 'Física', 'Informática', 'Historia']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 5)); // Generar 5 profesores

        DB::table('profesores')->insert($profesores);
    }
}
