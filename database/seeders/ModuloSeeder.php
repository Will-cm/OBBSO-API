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
        DB::table('modulos')->insert([
          'titulo' => 'personas',
        ]);

        DB::table('modulos')->insert([
          'titulo' => 'usuarios',
        ]);

        DB::table('modulos')->insert([
          'titulo' => 'roles',
        ]);

        DB::table('modulos')->insert([
          'titulo' => 'modulos',
        ]);

        DB::table('modulos')->insert([
          'titulo' => 'permisos',
        ]);

        DB::table('modulos')->insert([
          'titulo' => 'productos',
        ]);

        ////////
        DB::table('modulos')->insert([
          'titulo' => 'pedidos',
        ]);

        DB::table('modulos')->insert([
          'titulo' => 'clientes',
        ]);
    }
}
