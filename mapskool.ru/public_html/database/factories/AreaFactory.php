<?php
/**
 * Created by PhpStorm.
 * User: dmitr
 * Date: 14.04.2019
 * Time: 12:43
 */

use Faker\Generator as Faker;


$factory->define(App\Area::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});