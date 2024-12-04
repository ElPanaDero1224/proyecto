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
        Schema::create('carrito_reservacion', function (Blueprint $table) {
            $table->id();
            $table->integer('precio_total_carrito');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->unsignedBigInteger('reserva_vuelo_id');
            $table->foreign('reserva_vuelo_id')->references('id')->on('reserva_vuelos');
            $table->unsignedBigInteger('reserva_hotel_id');
            $table->foreign('reserva_hotel_id')->references('id')->on('reserva_hoteles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_reservacion');
    }
};
