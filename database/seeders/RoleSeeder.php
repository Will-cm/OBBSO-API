<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; ///

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('rol')->truncate();  //elimina los datos previos
        DB::table('roles')->insert([
          'titulo' => 'Administrador',
        ]);

        DB::table('roles')->insert([
          'titulo' => 'Vendedor',
        ]);

        DB::table('roles')->insert([
          'titulo' => 'Cliente',
        ]);
    }
}
