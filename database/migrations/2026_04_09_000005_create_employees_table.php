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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // ID autoincremental de la DB
            
            // Datos Identificación (Skill 798: Scalability)
            $table->string('personal_id')->unique(); // IdPersonal solicitado
            $table->string('file_number')->unique(); // NumeroFicha solicitado
            $table->string('first_name'); 
            $table->string('last_name');
            $table->string('identification_card')->unique(); // Cedula
            
            // Contacto y Ubicación
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            
            // Relaciones de Ubicación (Geografía)
            $table->foreignId('state_id')->nullable()->constrained('states')->restrictOnDelete();
            $table->foreignId('municipality_id')->nullable()->constrained('municipalities')->restrictOnDelete();
            $table->foreignId('parish_id')->nullable()->constrained('parishes')->restrictOnDelete();
            
            // Datos Laborales
            $table->date('hired_at')->index(); // FechaIngreso
            $table->foreignId('payroll_type_id')->nullable()->constrained('payroll_types')->restrictOnDelete();
            $table->foreignId('position_id')->nullable()->constrained('positions')->restrictOnDelete();
            $table->foreignId('cost_center_id')->nullable()->constrained('cost_centers')->restrictOnDelete();
            $table->foreignId('assigned_area_id')->nullable()->constrained('assigned_areas')->restrictOnDelete();
            $table->foreignId('contract_type_id')->nullable()->constrained('contract_types')->restrictOnDelete();
            $table->foreignId('shift_id')->nullable()->constrained('shifts')->restrictOnDelete();
            
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();

            // Índices para búsquedas rápidas (Senior Best Practice)
            $table->index(['first_name', 'last_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
