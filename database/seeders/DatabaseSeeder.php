<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Permisos de usuarios
        $admin = Role::factory()->create([
            'name' => 'Admin',
        ]);
        $inv = Role::factory()->create([
            'name' => 'Invitado',
        ]);

        //USUARIOS POR DEFECTO PRECARGADOS EN EL SISTEMA
        User::factory()->create([
            'name' => 'Jolber Chirinos',
            'phone' => '+3462452488',
            'id_role' => $admin->id,
        ]);

        //USUARIOS POR DEFECTO PRECARGADOS EN EL SISTEMA
        $user = User::factory()->create([
            'name' => 'Invitado',
            'phone' => '+34622130388',
            'confirm' => 1,
            'id_role' => $inv->id,
        ]);

        //Inivitado 2 para probar cositas
        User::factory()->create([
            'name' => 'Aramando Casas',
            'phone' => '+34622130139',
            'id_role' => $inv->id,
            'id_responsable' => $user->id,
        ]);

        //Inivitado 3 para probar cositas
        User::factory()->create([
            'name' => 'Juanito Alcachofa',
            'phone' => '+3462452488',
            'id_role' => $inv->id,
            'confirm' => 1,
            'id_responsable' => $user->id,
        ]);
    }
}
