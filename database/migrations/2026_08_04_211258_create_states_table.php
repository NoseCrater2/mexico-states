<?php

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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->char('cve_ent', 2);
            $table->string('nomgeo', 50);
            $table->char('nom_abrev', 10);
            $table->integer('pob_total');
            $table->integer('pob_femenina');
            $table->integer('pob_masculina');
            $table->integer('total_viviendas_habitadas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
