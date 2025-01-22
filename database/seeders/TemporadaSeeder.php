<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemporadaSeeder extends Seeder
{
    public function run()
    {
        DB::table('temporadas')->insert([
            ['fecha_inicio' => '2025-01-01', 'fecha_fin' => '2025-06-30', 'created_at' => now(), 'updated_at' => now()],
            ['fecha_inicio' => '2025-07-01', 'fecha_fin' => '2025-12-31', 'created_at' => now(), 'updated_at' => now()],
            ['fecha_inicio' => '2026-01-01', 'fecha_fin' => '2026-06-30', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
