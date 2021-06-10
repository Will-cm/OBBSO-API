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
        $modulo = DB::table('modulo')->select('id')->first();
        //dd($persona); ///mostrar en consola

        DB::table('permisos')->insert([
          'rol_id' => $rol->id,
          'modulo_id' => $modulo->id,
          'estado' => 1,
        ]);
    }
}
