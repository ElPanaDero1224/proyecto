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
        Schema::create('vuelos_en_reservas_vuelos', function (Blueprint $table) {
            $table->id();
            /* $table->unsignedBigInteger('reserva_vuelo_id');
            $table->foreign('reserva_vuelo_id')->references('id')->on('reserva_vuelos')->nullable(); */
            $table->unsignedBigInteger('vuelo_id');
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->unsignedBigInteger('cantidadBoletos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos_en_reservas_vuelos');
    }
};
