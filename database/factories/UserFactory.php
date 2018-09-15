<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(GIDV\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'us_idTipoDocumentoFK'=>$faker->number,
        'us_numeroDocumento'=>$faker->number,
        'us_idRolFK'=>$faker->number,
        'us_idCursoFK'=>$faker->number,
        'remember_token' => str_random(10),
    ];
});
