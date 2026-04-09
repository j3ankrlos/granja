<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralCatalogSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cargos (Positions)
        $positions = [
            ['id' => 1, 'name' => 'ANALISTA DE GESTION DE LA OPERACION'],
            ['id' => 2, 'name' => 'COORDINADOR DE GRANJA'],
            ['id' => 3, 'name' => 'ENCARGADO DE PRODUCCION'],
            ['id' => 4, 'name' => 'MEDICO VETERINARIO'],
            ['id' => 5, 'name' => 'EXPERTO EN BUENAS PRACTICAS REPRODUCTIVAS'],
            ['id' => 6, 'name' => 'OPERARIO DE ALIMENTACION'],
            ['id' => 7, 'name' => 'OPERARIO DE SERVICIOS GENERALES'],
            ['id' => 8, 'name' => 'OPERARIO GENERAL'],
            ['id' => 9, 'name' => 'OPERARIO GENERAL CONTROL DE ROEDORES'],
            ['id' => 10, 'name' => 'SUPERVISOR DE LABORATORIO I'],
            ['id' => 11, 'name' => 'SUPERVISOR DE PRODUCCION'],
            ['id' => 12, 'name' => 'SUPERVISOR DE PRODUCCION II'],
            ['id' => 13, 'name' => 'ASISTENTE ADMINISTRATIVO'],
        ];
        DB::table('positions')->insertOrIgnore($positions);

        // 2. Centros de Costo (Cost Centers)
        $costCenters = [
            ['id' => 1, 'name' => 'BIOSEGURIDAD', 'code' => 'P210040002'],
            ['id' => 2, 'name' => 'CEBA PORCINA', 'code' => 'P210040008'],
            ['id' => 3, 'name' => 'CRIA Y LEVANTE PORCINO', 'code' => 'P210040006'],
            ['id' => 4, 'name' => 'MATERNIDAD PORCINA', 'code' => 'P210040005'],
            ['id' => 5, 'name' => 'PRECEBA PORCINA', 'code' => 'P210040007'],
            ['id' => 6, 'name' => 'PRODUCCION DE SEMEN', 'code' => 'P210040003'],
            ['id' => 7, 'name' => 'REPRODUCCION PORCINA', 'code' => 'P210040004'],
            ['id' => 8, 'name' => 'SANIDAD ANIMAL', 'code' => '0'],
        ];
        DB::table('cost_centers')->insertOrIgnore($costCenters);

        // 3. Áreas Asignadas (Assigned Areas)
        $assignedAreas = [
            ['id' => 1, 'name' => 'BIOSEGURIDAD'],
            ['id' => 2, 'name' => 'COORDINACION'],
            ['id' => 3, 'name' => 'MATERNIDAD'],
            ['id' => 4, 'name' => 'MATERNIDAD EST'],
            ['id' => 5, 'name' => 'MATERNIDAD EXP'],
            ['id' => 6, 'name' => 'MATERNIDAD NOCHERO'],
            ['id' => 7, 'name' => 'OFICINA'],
            ['id' => 8, 'name' => 'REEMPLAZO'],
            ['id' => 9, 'name' => 'REEMPLAZO EST'],
            ['id' => 10, 'name' => 'REEMPLAZO EXP'],
            ['id' => 11, 'name' => 'REPRODUCCION'],
            ['id' => 12, 'name' => 'REPRODUCCION EST'],
            ['id' => 13, 'name' => 'REPRODUCCION EXP'],
            ['id' => 14, 'name' => 'STUD DE MACHOS'],
        ];
        DB::table('assigned_areas')->insertOrIgnore($assignedAreas);

        // 4. Turnos (Shifts)
        $shifts = [
            [
                'id' => 1, 'name' => 'T1', 'type' => 'D', 
                'start_time' => '07:30:00', 'end_time' => '16:00:00', 
                'total_hours' => 7.5, 'break_start' => '12:00 pm', 'break_end' => '1:00 pm'
            ],
            [
                'id' => 2, 'name' => 'T2', 'type' => 'DN', 
                'start_time' => '15:00:00', 'end_time' => '23:00:00', 
                'total_hours' => 7.0, 'break_start' => '7:00 pm', 'break_end' => '8:00 pm'
            ],
            [
                'id' => 3, 'name' => 'T3', 'type' => 'N', 
                'start_time' => '23:00:00', 'end_time' => '07:00:00', 
                'total_hours' => 7.0, 'break_start' => '2:00 am', 'break_end' => '3:00 am'
            ],
        ];
        DB::table('shifts')->insertOrIgnore($shifts);

        // 5. Tipos de Contrato (Contract Types)
        $contracts = [
            ['id' => 1, 'name' => 'Fijo'],
            ['id' => 2, 'name' => 'Contratado'],
        ];
        DB::table('contract_types')->insertOrIgnore($contracts);

        // 6. Tipos de Nomina (Payroll Types)
        $payrolls = [
            ['id' => 1, 'name' => 'Operario', 'code' => '1'],
            ['id' => 2, 'name' => 'Confidencial', 'code' => '3'],
            ['id' => 3, 'name' => 'Empleado', 'code' => '4'],
        ];
        DB::table('payroll_types')->insertOrIgnore($payrolls);

        // 7. Unidades de Producción Principales (Production Sites)
        $sites = [
            ['id' => 1, 'name' => 'Sitio I', 'acronym' => 'S1'],
            ['id' => 2, 'name' => 'Sitio II', 'acronym' => 'S2'],
            ['id' => 3, 'name' => 'Sitio III', 'acronym' => 'S3'],
        ];
        DB::table('production_sites')->insertOrIgnore($sites);
    }
}
