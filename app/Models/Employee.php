<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'personal_id',
        'file_number',
        'first_name',
        'last_name',
        'identification_card',
        'phone',
        'email',
        'city',
        'address',
        'state_id',
        'municipality_id',
        'parish_id',
        'hired_at',
        'payroll_type_id',
        'position_id',
        'cost_center_id',
        'assigned_area_id',
        'contract_type_id',
        'shift_id',
        'is_active',
    ];

    protected $casts = [
        'hired_at' => 'date',
        'is_active' => 'boolean',
    ];

    // Relaciones Geográficas
    public function state(): BelongsTo { return $this->belongsTo(State::class); }
    public function municipality(): BelongsTo { return $this->belongsTo(Municipality::class); }
    public function parish(): BelongsTo { return $this->belongsTo(Parish::class); }

    // Relaciones Administrativas
    public function payrollType(): BelongsTo { return $this->belongsTo(PayrollType::class); }
    public function position(): BelongsTo { return $this->belongsTo(Position::class); }
    public function costCenter(): BelongsTo { return $this->belongsTo(CostCenter::class); }
    public function assignedArea(): BelongsTo { return $this->belongsTo(AssignedArea::class); }
    public function contractType(): BelongsTo { return $this->belongsTo(ContractType::class); }
    public function shift(): BelongsTo { return $this->belongsTo(Shift::class); }

    /**
     * Datos Especializados si el empleado es Veterinario
     */
    public function veterinarian(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Veterinarian::class);
    }

    // Asignaciones históricas
    public function assignments(): HasMany
    {
        return $this->hasMany(UnitAssignment::class);
    }
}
