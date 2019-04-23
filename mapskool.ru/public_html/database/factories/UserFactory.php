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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'email' => 'dmitrie43@mail.ru',
        'password' => bcrypt('ad123min'), // secret
    ];
});

$factory->define(App\Organization::class, function (Faker $faker) {
    return [
        'nameOrganization' => $faker->sentence,
//        'fullNameDirector' => $faker->sentence,
//        'image' => 'photo1.png',
//        'fullNameResponsible' => $faker->sentence,
        'statusOrganization' => $faker->sentence,
        'numberDocumentation' => $faker->numberBetween(0,5000),
    ];
});
