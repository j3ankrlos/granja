<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\UnitType;
use Illuminate\Database\Seeder;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hierarchies = [
            // Sitio I
            ['name' => 'Granja', 'level' => 0, 'site_code' => 'I'],
            ['name' => 'Galpón/Nave', 'level' => 1, 'site_code' => 'I'],
            ['name' => 'Fila', 'level' => 2, 'site_code' => 'I'],
            ['name' => 'Jaula/Corral', 'level' => 3, 'site_code' => 'I'],

            // Sitio II
            ['name' => 'Galpón', 'level' => 0, 'site_code' => 'II'],
            ['name' => 'Sala', 'level' => 1, 'site_code' => 'II'],
            ['name' => 'Corral', 'level' => 2, 'site_code' => 'II'],

            // Sitio III
            ['name' => 'Núcleo', 'level' => 0, 'site_code' => 'III'],
            ['name' => 'Galpón', 'level' => 1, 'site_code' => 'III'],
            ['name' => 'Corral', 'level' => 2, 'site_code' => 'III'],
        ];

        foreach ($hierarchies as $data) {
            UnitType::updateOrCreate(
                ['name' => $data['name'], 'site_code' => $data['site_code']],
                ['level' => $data['level']]
            );
        }
    }
}
