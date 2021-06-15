<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; ///
use Illuminate\Support\Facades\Hash;  ///

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->truncate();  //elimina los datos previos

        $persona = DB::table('personas')->select('id')->first();
        //$rol = DB::table('roles')->select('id')->first();
        //dd($persona); ///mostrar en consola

        DB::table('users')->insert([          
          'username' => 'admin',
          'password' => Hash::make('123456'),
          'persona_id' => $persona->id,
          //'rol_id' => $rol->id,
        ]);

        DB::table('users')->insert([          
          'username' => 'user',
          'password' => Hash::make('123456'),
          'persona_id' => 2,
          //'rol_id' => 2,
        ]);
    }
}
