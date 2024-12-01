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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->string('ubicacion',255);
            $table->integer('categoria');
            $table->longText('descripcion');
            $table->longtext('servicios');
            $table->longtext('distancia_puntos_turisticos');
            $table->integer('distancia_centro');
            $table->longText('politicas_cancelacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
