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
          'modulo' => 'personas',
        ]);

        DB::table('modulos')->insert([
          'modulo' => 'usuarios',
        ]);

        DB::table('modulos')->insert([
          'modulo' => 'roles',
        ]);

        DB::table('modulos')->insert([
          'modulo' => 'modulos',
        ]);

        DB::table('modulos')->insert([
          'modulo' => 'permisos',
        ]);

        DB::table('modulos')->insert([
          'modulo' => 'productos',
        ]);

        ////////
        DB::table('modulos')->insert([
          'modulo' => 'pedidos',
        ]);

        DB::table('modulos')->insert([
          'modulo' => 'empleados',
        ]);
    }
}
