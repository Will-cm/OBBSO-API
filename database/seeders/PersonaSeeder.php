<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   ////

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
          'nombres' => 'Luis',  //Str::random(10),  //nombre randon de 10 carac..
          'apellidos' => 'Cabrera',
          'celula_identidad' => '123456',
          'celular' => '77733444',
          'estado' => 1,
        ]);

        DB::table('personas')->insert([
          'nombres' => 'Pedro',  //Str::random(10),  //nombre randon de 10 carac..
          'apellidos' => 'Aguillera',
          'celula_identidad' => '234573',
          'celular' => '66633444',
          'estado' => 1,
        ]);

        DB::table('personas')->insert([
          'nombres' => 'Maria',  //Str::random(10),  //nombre randon de 10 carac..
          'apellidos' => 'Perez',
          'celula_identidad' => '234556',
          'celular' => '66633667',
          'estado' => 1,
        ]);
    }
}
