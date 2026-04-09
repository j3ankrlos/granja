<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $species = [
            'Porcino',
            'Caprino',
            'Bovino',
        ];

        foreach ($species as $name) {
            Species::updateOrCreate(['name' => $name]);
        }
    }
}
