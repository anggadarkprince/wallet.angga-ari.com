<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Saving;
use Faker\Generator as Faker;

$factory->define(Saving::class, function (Faker $faker) {
    return [
        'saving_title' => $faker->words(2, true),
        'saving_type' => $faker->randomElement(['BANK', 'CASH', 'OTHER']),
        'account_name' => $faker->name,
        'account_number' => $faker->bankAccountNumber,
        'currency' => $faker->currencyCode,
        'currency_symbol' => $faker->currencyCode,
    ];
});
