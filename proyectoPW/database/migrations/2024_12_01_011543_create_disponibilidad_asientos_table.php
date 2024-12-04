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
        Schema::create('disponibilidad_asientos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_asiento',255);
            $table->integer('disponibilidad_total');
            $table->integer('disponibilidadReferencia');
            $table->unsignedBigInteger('vuelo_id')->nullable();
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilidad_asientos');
    }
};
