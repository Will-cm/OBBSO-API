<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; ///

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('rol')->truncate();  //elimina los datos previos
        DB::table('modulo')->insert([
          'titulo' => 'usuarios',
        ]);

        DB::table('modulo')->insert([
          'titulo' => 'productos',
        ]);
    }
}
