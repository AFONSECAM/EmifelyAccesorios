<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->firstName,
        'email' => $faker->unique()->email,
        'ruc_number' => $faker->randomNumber(8, false),
        'address' => $faker->streetAddress,
        'phone' => $faker->phoneNumber
    ];
});