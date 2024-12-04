<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'nombre' => 'Admin',
                'privilegios' => 'Acceso completo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre' => 'Cliente',
                'privilegios' => 'Acceso limitado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
