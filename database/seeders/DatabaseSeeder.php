<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * 1. EJECUTAR EL ROLE SEEDER
         * Este seeder crea los permisos, el rol 'Super Admin' 
         * y tu usuario administrador principal (admin@granja.com).
         */
        $this->call([
            RoleSeeder::class,
            SpeciesSeeder::class,
            GeneralCatalogSeeder::class,
            UnitTypeSeeder::class,
            GeographySeeder::class,
        ]);

        /**
         * 2. USUARIO DE PRUEBA ADICIONAL (Opcional)
         * Si necesitas un usuario extra que no sea el admin, 
         * puedes descomentar las siguientes líneas.
         */
        /*
        User::factory()->create([
            'name' => 'Usuario de Pruebas',
            'email' => 'test@example.com',
        ]);
        */

        // Si quisieras crear 10 usuarios aleatorios:
        // User::factory(10)->create();
    }
}