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

        //Novios
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

        //Familia de Jolber 
        $josmel = User::factory()->create([
            'name' => 'Josmel Chirinos',
            'phone' => '+34622130388',
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Carmen Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $josmel->id,
        ]);

        $padre = User::factory()->create([
            'name' => 'Jose Rafael Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Hellen Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $padre->id,
        ]);

        $joscar = User::factory()->create([
            'name' => 'Joscar Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Glemary de Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $joscar->id,
        ]);

        User::factory()->create([
            'name' => 'Isabella Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $joscar->id,
        ]);

        User::factory()->create([
            'name' => 'Isaias Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $joscar->id,
        ]);

        $joendry = User::factory()->create([
            'name' => 'Joendry Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Andrea de Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $joendry->id,
        ]);

        User::factory()->create([
            'name' => 'J. David Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $joendry->id,
        ]);

        User::factory()->create([
            'name' => 'J. Daniel Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $joendry->id,
        ]);    

        $goyo = User::factory()->create([
            'name' => 'Jose Colina (Goyo)',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Jose Gregorio Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $goyo->id,
        ]);

        User::factory()->create([
            'name' => 'Ronny Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $goyo->id,
        ]); 

        $milagro = User::factory()->create([
            'name' => 'Milagro Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Johana Urbina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $milagro->id,
        ]);

        User::factory()->create([
            'name' => 'Jonatan Urbina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        $jonny = User::factory()->create([
            'name' => 'Jonny Urbina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Iraida de Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $jonny->id,
        ]);

        $marisela = User::factory()->create([
            'name' => 'José Acosta',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Marisela Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $marisela->id,
        ]);

        User::factory()->create([
            'name' => 'Jorisbel Acosta',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $marisela->id,
        ]);

        $joendi = User::factory()->create([
            'name' => 'Joendi Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Elizabet Melendez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $joendi->id,
        ]);

        User::factory()->create([
            'name' => 'Miguel Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        $saygel = User::factory()->create([
            'name' => 'Saygel Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Esposo de Saygel',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $saygel->id,
        ]);

        $enrique = User::factory()->create([
            'name' => 'Enrique Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Indira de Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $enrique->id,
        ]);

        $chinta = User::factory()->create([
            'name' => 'Esther Colina',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Esposo de Esther',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $chinta->id,
        ]);
        
        User::factory()->create([
            'name' => 'Natalio Chirinos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);
        
        $abraham = User::factory()->create([
            'name' => 'Abraham Colmenarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Yildre de Colmenarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $abraham->id,
        ]);

        User::factory()->create([
            'name' => 'Antonio Rodriguez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $abraham->id,
        ]);

        $jerklyn = User::factory()->create([
            'name' => 'Jerklyn Segueri',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Yanny de Segueri',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $jerklyn->id,
        ]);

        $yohan = User::factory()->create([
            'name' => 'Yohan Paez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Yohely de Paez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $yohan->id,
        ]);


        //Iglesia
        $nestor = User::factory()->create([
            'name' => 'Nestor Juarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Yuliamni de Juarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $nestor->id,
        ]);

        User::factory()->create([
            'name' => 'Marcelo de Juarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $nestor->id,
        ]);

        User::factory()->create([
            'name' => 'Monserrat de Juarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $nestor->id,
        ]);

        User::factory()->create([
            'name' => 'Iliana Arangure',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $nestor->id,
        ]);

        User::factory()->create([
            'name' => 'Santiago Arangure',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $nestor->id,
        ]);

        User::factory()->create([
            'name' => 'Nohemi de Juarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $nestor->id,
        ]);

        User::factory()->create([
            'name' => 'Yosser Martinez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        $carlos = User::factory()->create([
            'name' => 'Carlos Perez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Leedy de Perez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $carlos->id,
        ]);
        
        $neyla = User::factory()->create([
            'name' => 'Neyla Castillo',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Acompañante de Neyla',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $neyla->id,
        ]);

        $israel = User::factory()->create([
            'name' => 'Israel Ballesteros',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Raiza de Ballesteros',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $israel->id,
        ]);

        $fili = User::factory()->create([
            'name' => 'Filiberto Morín',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Thaile de Morín',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $fili->id,
        ]);

        User::factory()->create([
            'name' => 'Santiago de Morín',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $fili->id,
        ]);


        //Amigos 
        $jose = User::factory()->create([
            'name' => 'Jose Seijas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Mirella de Seijas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $jose->id,
        ]);

        User::factory()->create([
            'name' => 'Ignacio Seijas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $jose->id,
        ]);

        $jesus = User::factory()->create([
            'name' => 'Jesus Reynoso',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Luisana Canelón',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $jesus->id,
        ]);

        User::factory()->create([
            'name' => 'Yon Salazar',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Henry Sanchez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Brancelys Gil',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Andrés Alvarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Kaina Osal',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);
        
        User::factory()->create([
            'name' => 'Zenaida Villegas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        $raibel = User::factory()->create([
            'name' => 'Raibel Santana',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Alfredo Benítez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $raibel->id,
        ]);

        $raiza = User::factory()->create([
            'name' => 'Raiza Vivas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Manuel',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $raiza->id,
        ]);

        $elizabeth = User::factory()->create([
            'name' => 'Elizabethh Villegas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Edgar Alvarez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $elizabeth->id,
        ]);

        $dayer = User::factory()->create([
            'name' => 'Dayerlyn Godoy',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'María Benítez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $dayer->id,
        ]);
        
        User::factory()->create([
            'name' => 'José Godoy',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $dayer->id,
        ]);

        $sol = User::factory()->create([
            'name' => 'Sol Corrales',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Albert Gonzales',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $sol->id,
        ]);
        
        User::factory()->create([
            'name' => 'Neuvith Gonzales',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $sol->id,
        ]);

        //Familia de Javianny
        $javier = User::factory()->create([
            'name' => 'Francisco Javier Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Lenny de Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $javier->id,
        ]);
        
        User::factory()->create([
            'name' => 'Mario Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $javier->id,
        ]);

        $yolber = User::factory()->create([
            'name' => 'Yolber Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Olibet de Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $yolber->id,
        ]);

        User::factory()->create([
            'name' => 'Jilberth Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        $mayer = User::factory()->create([
            'name' => 'Maryelis González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Maikely Suárez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $mayer->id,
        ]);

        User::factory()->create([
            'name' => 'Cristian Suárez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $mayer->id,
        ]);

        $marilin = User::factory()->create([
            'name' => 'Marilyn González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Orlando Salazar',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $marilin->id,
        ]);

        User::factory()->create([
            'name' => 'Yunior Salazar',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $marilin->id,
        ]);

        User::factory()->create([
            'name' => 'Miguelangel Salazar',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $marilin->id,
        ]);

        $mario = User::factory()->create([
            'name' => 'Mario José González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Ingrid Ramírez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $mario->id,
        ]);

        $mervin = User::factory()->create([
            'name' => 'Mervin González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Rosennys Torrealba',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $mervin->id,
        ]);

        User::factory()->create([
            'name' => 'Oliver González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $mervin->id,
        ]);

        $maria = User::factory()->create([
            'name' => 'María González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Julio Calderón',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $maria->id,
        ]);

        User::factory()->create([
            'name' => 'Dylan Pérez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $maria->id,
        ]);

        $fabiola = User::factory()->create([
            'name' => 'Fabiola Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Sergio González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $fabiola->id,
        ]);

        User::factory()->create([
            'name' => 'Stefany González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $fabiola->id,
        ]);

        User::factory()->create([
            'name' => 'Sergio González(Hijo)',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $fabiola->id,
        ]);

        User::factory()->create([
            'name' => 'Mathias González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $fabiola->id,
        ]);

        $yito = User::factory()->create([
            'name' => 'Jesús Rodríguez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Yeli Rodríguez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $yito->id,
        ]);

        User::factory()->create([
            'name' => 'Alondra Rodríguez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $yito->id,
        ]);

        $alberto = User::factory()->create([
            'name' => 'Alberto Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Rocio de Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $alberto->id,
        ]);

        $alfredo = User::factory()->create([
            'name' => 'Alfredo Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Dulce de Rojas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $alfredo->id,
        ]);

        User::factory()->create([
            'name' => 'Gabriel Contreras',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        $fernando = User::factory()->create([
            'name' => 'Fernando Echeverría',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Rosangel de Echeverría',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $fernando->id,
        ]);

        $bairon = User::factory()->create([
            'name' => 'Barion Florez',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'María Parada',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $bairon->id,
        ]);

        $amalia = User::factory()->create([
            'name' => 'Amalia Castellanos',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'José Gabriel Navas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $amalia->id,
        ]);
        
        User::factory()->create([
            'name' => 'María Navas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $amalia->id,
        ]);

        User::factory()->create([
            'name' => 'Javier Navas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $amalia->id,
        ]);

        User::factory()->create([
            'name' => 'Yhon Navas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $amalia->id,
        ]);

        $junior = User::factory()->create([
            'name' => 'Junior Navas',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'María Meliá',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $junior->id,
        ]);

        $gisela = User::factory()->create([
            'name' => 'Gisela Jaimes',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Mariely Jaimes',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $gisela->id,
        ]);    

        $serrano = User::factory()->create([
            'name' => 'José Serrano',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Nancy de Serrano',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $serrano->id,
        ]);   

        User::factory()->create([
            'name' => 'Mario González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]); 

        $johan = User::factory()->create([
            'name' => 'Johan González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Rosa de González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $johan->id,
        ]); 

        User::factory()->create([
            'name' => 'Joalis González',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $johan->id,
        ]); 

        $jairo = User::factory()->create([
            'name' => 'Jairo Albornoz',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
        ]);

        User::factory()->create([
            'name' => 'Zenaida de Albornoz',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $jairo->id,
        ]); 

        User::factory()->create([
            'name' => 'Adriana Albornoz',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $jairo->id,
        ]); 

        User::factory()->create([
            'name' => 'Adriana Contreras',
            'phone' => null,
            'confirm' => 0,
            'arrival' => null,
            'id_role' => $inv->id,
            'id_responsable' => $jairo->id,
        ]); 
    }
}
