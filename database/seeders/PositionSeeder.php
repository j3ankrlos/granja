<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            'Coordinador',
            'Analista',
            'Supervisor',
            'Operario',
            'Operario Calificado',
            'Encargado',
        ];

        foreach ($positions as $name) {
            Position::updateOrCreate(['name' => $name]);
        }
    }
}
