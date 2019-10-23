<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Usuario::create([
            'name' => 'David Villegas',
            'email' => 'david.villegas.aguilar@gmail.com',
            'password' => bcrypt('123123')
        ]);*/

        factory(Usuario::class, 10)->create();
    }
}
