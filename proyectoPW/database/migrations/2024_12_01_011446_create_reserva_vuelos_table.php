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
        Schema::create('reserva_vuelos', function (Blueprint $table) {
            $table->id();
            $table->integer('adultos');
            $table->integer('niños');
            $table->integer('infantes');
            $table->integer('precio_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_vuelos');
    }
};
