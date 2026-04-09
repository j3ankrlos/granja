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
        Schema::create('unit_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->integer('level')->index(); // 0: Sitios/Granjas, 1: Galpones, etc.
            $table->string('site_code'); // I, II, III
            $table->timestamps();

            $table->unique(['name', 'site_code'], 'unq_unit_type_site');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_types');
    }
};
