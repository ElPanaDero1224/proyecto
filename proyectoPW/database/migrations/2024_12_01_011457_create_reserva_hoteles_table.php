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
        Schema::create('reserva_hoteles', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_check_in');
            $table->dateTime('fecha_check_out');
            $table->integer('adultos');
            $table->integer('niños');
            $table->integer('estatus');
            $table->integer('precio_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_hoteles');
    }
};
