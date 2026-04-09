<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veterinarian extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'medical_college_code',
        'ministry_code',
        'registration_status',
        'initials',
        'production_site_id',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function productionSite(): BelongsTo
    {
        return $this->belongsTo(ProductionSite::class);
    }
}
