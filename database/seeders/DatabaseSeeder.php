<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PersonaSeeder::class);  ////solo llamar los seeders
        $this->call(RoleSeeder::class);  
        $this->call(ModuloSeeder::class);  
        $this->call(PermisosSeeder::class);  
        $this->call(UserSeeder::class);  
        $this->call(Rol_userSeeder::class);  
    }
}
