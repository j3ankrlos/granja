<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Catálogo de Unidades Principales (Sitio I, II, III)
        Schema::create('production_sites', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Sitio I, Sitio II, etc.
            $table->string('acronym')->nullable(); // SIGLAS
            $table->timestamps();
        });

        // Tabla de Especialización para Veterinarios (Skill 798)
        Schema::create('veterinarians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            
            $table->string('medical_college_code')->nullable(); // CodigoColegioMedico
            $table->string('ministry_code')->nullable(); // CodigoMinisterio
            $table->string('registration_status')->nullable(); // EstadoRegistro
            $table->string('initials')->nullable(); // Siglas del Veterinario
            
            // Unidad asignada específicamente para su registro médico
            $table->foreignId('production_site_id')->nullable()->constrained('production_sites')->restrictOnDelete();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('veterinarians');
        Schema::dropIfExists('production_sites');
    }
};
