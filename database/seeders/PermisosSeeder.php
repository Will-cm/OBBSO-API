<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; ///

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->truncate();  //elimina los datos previos

        $user = DB::table('users')->select('id_user')->first();
        $modulo = DB::table('modulos')->select('id_modulo')->first();
        //dd($persona); ///mostrar en consola

        DB::table('permisos')->insert([
          'id_user' => $user->id_user,
          'id_modulo' => $modulo->id_modulo,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'id_user' => 1,
          'id_modulo' => 2,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'id_user' => 1,
          'id_modulo' => 3,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'id_user' => 1,
          'id_modulo' => 4,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'id_user' => 1,
          'id_modulo' => 5,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'id_user' => 1,
          'id_modulo' => 6,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'id_user' => 1,
          'id_modulo' => 7,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'id_user' => 1,
          'id_modulo' => 8,
          'estado' => 1,
        ]);

        /////user////////////////////////////
        DB::table('permisos')->insert([
          'id_user' => 2,
          'id_modulo' => 1,
        ]);

        DB::table('permisos')->insert([
          'id_user' => 2,
          'id_modulo' => 2,
        ]);
        DB::table('permisos')->insert([
          'id_user' => 2,
          'id_modulo' => 3,
        ]);
        DB::table('permisos')->insert([
          'id_user' => 2,
          'id_modulo' => 4,
        ]);
        DB::table('permisos')->insert([
          'id_user' => 2,
          'id_modulo' => 5,
        ]);
        DB::table('permisos')->insert([
          'id_user' => 2,
          'id_modulo' => 6,
          'estado' => 1
        ]);
        DB::table('permisos')->insert([
          'id_user' => 2,
          'id_modulo' => 7,
          'estado' => 1
        ]);
        DB::table('permisos')->insert([
          'id_user' => 2,
          'id_modulo' => 8,
        ]);
    }
}
