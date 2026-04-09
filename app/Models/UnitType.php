<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level', 'site_code'];

    protected $casts = [
        'level' => 'integer',
    ];

    public function productionUnits(): HasMany
    {
        return $this->hasMany(ProductionUnit::class);
    }
}
