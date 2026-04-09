<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('production_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('production_units')
                ->restrictOnDelete();
            
            $table->foreignId('unit_type_id')
                ->constrained('unit_types')
                ->restrictOnDelete();
            
            $table->foreignId('species_id')
                ->nullable()
                ->constrained('species')
                ->nullOnDelete();

            $table->string('name');
            $table->string('code')->unique();
            $table->boolean('is_active')->default(true)->index();
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['parent_id', 'unit_type_id'], 'idx_recursivity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_units');
    }
};
