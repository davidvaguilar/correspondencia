<?php

use Illuminate\Database\Seeder;
use App\Expediente;

class ExpedientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Expediente::class, 5)->create();
    }
}
