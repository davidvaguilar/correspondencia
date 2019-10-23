<?php

use Illuminate\Database\Seeder;
use App\DocumentoUsuario;

class DocumentosUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DocumentoUsuario::class, 7)->create();
    }
}
