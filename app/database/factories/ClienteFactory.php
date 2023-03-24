<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->email,
        'ultima_compra' => $faker->word
    ];
});
