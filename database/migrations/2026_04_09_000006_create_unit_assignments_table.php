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
        Schema::create('unit_assignments', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();
            
            $table->foreignId('position_id')
                ->constrained('positions')
                ->restrictOnDelete();
            
            $table->foreignId('production_unit_id')
                ->constrained('production_units')
                ->cascadeOnDelete();

            $table->date('start_date');
            $table->date('end_date')->nullable()->index();
            $table->boolean('is_active')->default(true)->index();
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['employee_id', 'production_unit_id', 'position_id'], 'idx_emp_unit_pos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_assignments');
    }
};
