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
          'ci' => '123456',
          'celular' => '77733444',
        ]);
    }
}
