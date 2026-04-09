<?php

namespace App\Services;

use App\Models\User;
// Aquí importarías tus otros modelos como Inventario, etc.

/**
 * Skill 798: Improve Codebase Architecture
 * Este servicio centraliza el cálculo de estadísticas para el Dashboard.
 */
class DashboardService
{
    public function getStats(): array
    {
        return [
            'inventarioA002Count' => 45, // Simulado, aquí iría query real
            'inventarioA006Count' => 12,
            'solicitudesPendientesCount' => 3,
            'alertasStockA006Count' => 5,
            'personalActivoCount' => User::count(),
            'enReposoCount' => 20,
            'vacacionesCount' => 8,
            'regresosPendientesCount' => 2,
        ];
    }
}
