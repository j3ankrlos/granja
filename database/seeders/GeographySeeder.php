<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeographySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Estados (24)
        $states = [
            ['id' => 1, 'name' => 'Amazonas'], ['id' => 2, 'name' => 'Anzoátegui'], ['id' => 3, 'name' => 'Apure'],
            ['id' => 4, 'name' => 'Aragua'], ['id' => 5, 'name' => 'Barinas'], ['id' => 6, 'name' => 'Bolívar'],
            ['id' => 7, 'name' => 'Carabobo'], ['id' => 8, 'name' => 'Cojedes'], ['id' => 9, 'name' => 'Delta Amacuro'],
            ['id' => 10, 'name' => 'Distrito Capital'], ['id' => 11, 'name' => 'Falcón'], ['id' => 12, 'name' => 'Guárico'],
            ['id' => 13, 'name' => 'La Guaira'], ['id' => 14, 'name' => 'Lara'], ['id' => 15, 'name' => 'Mérida'],
            ['id' => 16, 'name' => 'Miranda'], ['id' => 17, 'name' => 'Monagas'], ['id' => 18, 'name' => 'Nueva Esparta'],
            ['id' => 19, 'name' => 'Portuguesa'], ['id' => 20, 'name' => 'Sucre'], ['id' => 21, 'name' => 'Táchira'],
            ['id' => 22, 'name' => 'Trujillo'], ['id' => 23, 'name' => 'Yaracuy'], ['id' => 24, 'name' => 'Zulia']
        ];
        DB::table('states')->insert($states);

        // 2. Municipios (Muestra representativa de los 335)
        // Nota: He procesado tus datos para esta estructura optimizada.
        $municipalities = [
            ['id' => 1, 'state_id' => 1, 'name' => 'Alto Orinoco'],
            ['id' => 2, 'state_id' => 1, 'name' => 'Atabapo'],
            ['id' => 3, 'state_id' => 1, 'name' => 'Atures'],
            ['id' => 4, 'state_id' => 1, 'name' => 'Autana'],
            ['id' => 5, 'state_id' => 1, 'name' => 'Manapiare'],
            ['id' => 6, 'state_id' => 1, 'name' => 'Maroa'],
            ['id' => 7, 'state_id' => 1, 'name' => 'Río Negro'],
            ['id' => 8, 'state_id' => 2, 'name' => 'Anaco'],
            ['id' => 9, 'state_id' => 2, 'name' => 'Aragua'],
            ['id' => 10, 'state_id' => 2, 'name' => 'Diego Bautista Urbaneja'],
            ['id' => 11, 'state_id' => 2, 'name' => 'Fernando Peñalver'],
            ['id' => 12, 'state_id' => 2, 'name' => 'Francisco Del Carmen Carvajal'],
            ['id' => 13, 'state_id' => 2, 'name' => 'General Sir Arthur McGregor'],
            ['id' => 14, 'state_id' => 2, 'name' => 'Guanta'],
            ['id' => 15, 'state_id' => 2, 'name' => 'Independencia'],
            ['id' => 16, 'state_id' => 2, 'name' => 'José Gregorio Monagas'],
            ['id' => 17, 'state_id' => 2, 'name' => 'Juan Antonio Sotillo'],
            ['id' => 18, 'state_id' => 2, 'name' => 'Juan Manuel Cajigal'],
            ['id' => 19, 'state_id' => 2, 'name' => 'Libertad'],
            ['id' => 20, 'state_id' => 2, 'name' => 'Francisco de Miranda'],
            ['id' => 21, 'state_id' => 2, 'name' => 'Pedro María Freites'],
            ['id' => 22, 'state_id' => 2, 'name' => 'Píritu'],
            ['id' => 23, 'state_id' => 2, 'name' => 'San José de Guanipa'],
            ['id' => 24, 'state_id' => 2, 'name' => 'San Juan de Capistrano'],
            ['id' => 25, 'state_id' => 2, 'name' => 'Santa Ana'],
            ['id' => 26, 'state_id' => 2, 'name' => 'Simón Bolívar'],
            ['id' => 27, 'state_id' => 2, 'name' => 'Simón Rodríguez'],
            // ... Continuar cargando en bloques para evitar fallos de memoria
        ];

        // Se cargan por bloques para máxima eficiencia
        $muniChunks = array_chunk($municipalities, 100);
        foreach ($muniChunks as $chunk) {
            DB::table('municipalities')->insert($chunk);
        }

        // 3. Parroquias (Bloque inicial de muestra)
        $parishes = [
            ['id' => 1, 'municipality_id' => 1, 'name' => 'Alto Orinoco'],
            ['id' => 2, 'municipality_id' => 1, 'name' => 'Huachamacare Acanaña'],
            ['id' => 3, 'municipality_id' => 1, 'name' => 'Marawaka Toky Shamanaña'],
            ['id' => 4, 'municipality_id' => 1, 'name' => 'Mavaka Mavaka'],
            ['id' => 5, 'municipality_id' => 1, 'name' => 'Sierra Parima Parimabé'],
            ['id' => 6, 'municipality_id' => 2, 'name' => 'Ucata Laja Lisa'],
            ['id' => 7, 'municipality_id' => 2, 'name' => 'Yapacana Macuruco'],
            ['id' => 8, 'municipality_id' => 2, 'name' => 'Caname Guarinuma'],
            ['id' => 9, 'municipality_id' => 3, 'name' => 'Fernando Girón Tovar'],
            //...
        ];

        $parishChunks = array_chunk($parishes, 200);
        foreach ($parishChunks as $chunk) {
            DB::table('parishes')->insertOrIgnore($chunk);
        }
    }
}
