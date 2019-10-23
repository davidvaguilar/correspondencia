<?php

use Illuminate\Database\Seeder;
use App\Documento;

class DocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Documento::class, 5)->create();
    }
}
