<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'birthday'   => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-10 years'),
        'phone'      => $faker->phoneNumber,
        'address'    => $faker->address
    ];
});
