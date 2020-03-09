<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'transaction_title' => $faker->realText(50),
        'transaction_date' => $faker->dateTimeThisYear()->format('Y-m-d'),
        'description' => $faker->realText(100),
        'location' => $faker->address,
        'type' => $faker->randomElement(['INCOME', 'EXPENSE']),
        'amount' => $faker->numberBetween(1000, 100000),
    ];
});
