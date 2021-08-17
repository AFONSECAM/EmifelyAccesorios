<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word(),
        'slug' => $faker->unique()->slug(),
        'icon' => $faker->randomElement([
            'icon-fruits',
            'icon-broccoli-1',
            'icon-beef',
            'icon-fish',
            'icon-fast-food',
            'icon-honey'
        ]),
        'description' => $faker->sentence(6, true),

    ];
});