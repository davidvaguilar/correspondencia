<?php

use Faker\Generator as Faker;
use App\Usuario;
use App\Expediente;
use App\Documento;

$factory->define(Documento::class, function (Faker $faker) {

    $fecha = $faker->dateTimeBetween('-1 years', '-5 days');
    $fecha_registro = $fecha->format('Y-m-d'); //    $scheduled_time = $fecha->format('H:i:s');
    
    $fecha = $faker->dateTimeBetween($fecha, '-3 days');
    $fecha_destino = $fecha->format('Y-m-d');

    $fecha = $faker->dateTimeBetween($fecha, 'now');
    $fecha_respuesta = $fecha->format('Y-m-d');

    $tipos = ['memorandum', 'ordinario', 'carta', 'oficina', 'solicitud', 'resolucion',
                    'email', 'fotocopia'];

    //$usuarios_recibe = User::pluck('id');
    $expedientes = Expediente::pluck('id');
    $usuarios_creacion = Usuario::pluck('id');

    return [
        'fecha_registro' => $fecha_registro,  
        'tipo' => $faker->randomElement($tipos),  
        'numero' => $faker->numberBetween(1, 200),
        'envia' => $faker->name,
        // 'recibe_usuario' => $faker->randomElement($usuarios_recibe),
        'materia' => $faker->text,
        'destino' => $faker->sentence(15),
        'fecha_destino' => $fecha_destino,
        'respuesta' => $faker->sentence(5),
        'fecha_respuesta' => $fecha_respuesta,
        'expediente_id' => $faker->randomElement($expedientes),
        'usuario_id' => $faker->randomElement($usuarios_creacion)
    ];
});
