<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; ///

class Rol_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol_users')->truncate();  //elimina los datos previos

        $rol = DB::table('roles')->select('id')->first();
        $user = DB::table('users')->select('id_usuario')->first();        

        DB::table('rol_users')->insert([          
          'rol_id' => $rol->id,
          'user_id' => $user->id_usuario,
        ]);

        DB::table('rol_users')->insert([          
          'rol_id' => 2,
          'user_id' => 2,
        ]);
    }
}
