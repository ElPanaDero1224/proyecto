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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_vuelo');
            $table->string('origen',255);
            $table->string('destino',255);
            $table->dateTime('fecha_salida');
            $table->dateTime('fecha_llegada');
            $table->string('duracion',255);
            #dato opcional
            $table->string('escalas',255)->nullable();
            $table->unsignedBigInteger('aerolinea_id')->nullable();
            #finDatoOpcional
            $table->foreign('aerolinea_id')->references('id')->on('aerolineas');
            $table->unsignedBigInteger('precio_id')->nullable();
            $table->foreign('precio_id')->references('id')->on('precios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
