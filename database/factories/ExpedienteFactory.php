<?php

use Faker\Generator as Faker;
use App\Usuario;
use App\Expediente;

$factory->define(Expediente::class, function (Faker $faker) {
    $usuarios = Usuario::pluck('id');
    return [
        'usuario_id' => $faker->randomElement($usuarios) //$usuarios, //$faker->numberBetween(1, 10),
    ];
});
