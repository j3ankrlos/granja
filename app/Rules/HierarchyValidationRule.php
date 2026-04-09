<?php

declare(strict_types=1);

namespace App\Rules;

use App\Models\ProductionUnit;
use App\Models\UnitType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class HierarchyValidationRule implements ValidationRule
{
    /**
     * @param int $unitTypeId ID del tipo de unidad que se intenta crear/editar
     */
    public function __construct(protected int $unitTypeId)
    {
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$value) {
            return;
        }

        $childType = UnitType::find($this->unitTypeId);
        $parentUnit = ProductionUnit::with('unitType')->find($value);

        if (!$childType || !$parentUnit) {
            $fail('La unidad padre o el tipo de unidad no son válidos.');
            return;
        }

        // Regla de Oro: El nivel del padre DEBE ser estrictamente menor que el del hijo
        if ($parentUnit->unitType->level >= $childType->level) {
            $fail("Lógica de Jerarquía Violada: Una unidad de tipo '{$childType->name}' (Nivel {$childType->level}) no puede tener como padre a una unidad de tipo '{$parentUnit->unitType->name}' (Nivel {$parentUnit->unitType->level}).");
        }

        // Regla 2: Deben pertenecer al mismo sitio
        if ($parentUnit->unitType->site_code !== $childType->site_code) {
             $fail("Conflicto de Sitio: No se puede asignar una unidad del Sitio '{$childType->site_code}' dentro de una unidad del Sitio '{$parentUnit->unitType->site_code}'.");
        }
    }
}
