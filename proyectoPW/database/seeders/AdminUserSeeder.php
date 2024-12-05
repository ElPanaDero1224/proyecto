<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Administrador',
            'apellido' => 'Turista',
            'telefono' => '4423527084',
            'email' => 'admiturista@gmail.com',
            'password' => Hash::make('admin123'), // Encriptación de contraseña
            'rol_id' => 1, // ID del rol de administrador
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

