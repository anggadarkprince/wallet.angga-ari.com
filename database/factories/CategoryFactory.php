<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category' => $faker->word,
        'type' => $faker->randomElement(['INCOME', 'EXPENSE']),
        'description' => $faker->realText(200),
    ];
});
