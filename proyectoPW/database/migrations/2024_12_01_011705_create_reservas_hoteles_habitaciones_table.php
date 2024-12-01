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
        Schema::create('reservas_hoteles_habitaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reserva_hotel_id');
            $table->foreign('reserva_hotel_id')->references('id')->on('reserva_hoteles');
            $table->unsignedBigInteger('habitacion_id');
            $table->foreign('habitacion_id')->references('id')->on('habitaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas_hoteles_habitaciones');
    }
};
