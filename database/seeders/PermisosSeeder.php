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

        $rol = DB::table('roles')->select('id')->first();
        $modulo = DB::table('modulos')->select('id')->first();
        //dd($persona); ///mostrar en consola

        DB::table('permisos')->insert([
          'rol_id' => $rol->id,
          'modulo_id' => $modulo->id,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'rol_id' => 1,
          'modulo_id' => 2,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'rol_id' => 1,
          'modulo_id' => 3,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'rol_id' => 1,
          'modulo_id' => 4,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'rol_id' => 1,
          'modulo_id' => 5,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'rol_id' => 1,
          'modulo_id' => 6,
          'estado' => 1,
        ]);

        /////user
        DB::table('permisos')->insert([
          'rol_id' => 2,
          'modulo_id' => 4,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'rol_id' => 2,
          'modulo_id' => 5,
          'estado' => 1,
        ]);

        DB::table('permisos')->insert([
          'rol_id' => 2,
          'modulo_id' => 6,
          'estado' => 0,
        ]);
    }
}
