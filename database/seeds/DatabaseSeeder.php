<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuariosTableSeeder::class);
        $this->call(ExpedientesTableSeeder::class);
       $this->call(DocumentosTableSeeder::class);
     //   $this->call(DocumentosUsuariosTableSeeder::class); eliminar clase para attack
        
    }
}
