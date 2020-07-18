<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Funcionarios::class, function (Faker $faker) {
    return [
        'nome' => $faker->text(15),
        'sobrenome' => $faker->text(15)
    ];
});
