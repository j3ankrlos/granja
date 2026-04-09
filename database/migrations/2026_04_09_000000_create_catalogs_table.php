<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Geografía
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('parishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipality_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
        });

        // 2. Nómina y Administración
        Schema::create('payroll_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->nullable();
            $table->timestamps();
        });

        Schema::create('cost_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->timestamps();
        });

        Schema::create('contract_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Fijo, Contratado
            $table->timestamps();
        });

        Schema::create('assigned_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // 3. Gestión de Horarios (Turnos)
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // T1, T2, T3
            $table->string('type'); // D, DN, N
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('total_hours', 5, 2);
            $table->string('break_start')->nullable();
            $table->string('break_end')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shifts');
        Schema::dropIfExists('assigned_areas');
        Schema::dropIfExists('contract_types');
        Schema::dropIfExists('cost_centers');
        Schema::dropIfExists('payroll_types');
        Schema::dropIfExists('parishes');
        Schema::dropIfExists('municipalities');
        Schema::dropIfExists('states');
    }
};
