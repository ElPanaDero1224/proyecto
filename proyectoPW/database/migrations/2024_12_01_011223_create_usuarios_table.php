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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->string('telefono', 12);
            $table->string('email', 255)->unique();
            $table->string('password', 255); // Cambiado a 'password' (requerido por Laravel)
            $table->unsignedBigInteger('rol_id');
            $table->string('two_factor_code', 6)->nullable(); // Código para doble autenticación
            $table->timestamp('two_factor_expires_at')->nullable(); // Tiempo de expiración del código
            $table->timestamps();

            // Llave foránea
            $table->foreign('rol_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

