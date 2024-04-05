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
        $novios = Role::factory()->create([
            'name' => 'Novios',
        ]);
        $inv = Role::factory()->create([
            'name' => 'Invitado',
        ]);

        //USUARIOS POR DEFECTO PRECARGADOS EN EL SISTEMA
        User::factory()->create([
            'name' => 'Javianny Rojas',
            'phone' => '+584245827911',
            'confirm' => 1,
            'arrival' => null,
            'id_role' => $novios->id,
        ]);
        User::factory()->create([
            'name' => 'Jolber Chirinos',
            'phone' => '+34622130388',
            'confirm' => 1,
            'arrival' => null,
            'id_role' => $novios->id,
        ]);

        //USUARIOS POR DEFECTO PRECARGADOS EN EL SISTEMA
        $user = User::factory()->create([
            'name' => 'Invitado',
            'phone' => '+34622130388',
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        //Inivitado 2 para probar cositas
        User::factory()->create([
            'name' => 'Aramando Casas',
            'phone' => '+34622130139',
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $user->id,
        ]);

        //Inivitado 3 para probar cositas
        User::factory()->create([
            'name' => 'Juanito Alcachofa',
            'phone' => '+3462452488',
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $user->id,
        ]);
    }
}
