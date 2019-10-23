<?php

use Faker\Generator as Faker;
use App\DocumentoUsuario;
use App\User;
use App\Documento;

$factory->define(DocumentoUsuario::class, function (Faker $faker) {
    
    $usuarios = User::pluck('id');
    $documentos = Documento::pluck('id');
    return [
        'usuario_id' => $faker->randomElement($usuarios),
        'documento_id' => $faker->randomElement($documentos),
    ];
});
