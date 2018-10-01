<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'user_id' => function ($data) {
            return factory(\App\User::class)->create();
        },
        'title' => $faker->randomElement(['worship service', 'thanksgiving', 'prayer meeting']),
        'schedule' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 5 days')
    ];
});

$factory->state(App\Service::class, 'note', function (Faker $faker) {
    return [
        'note' => $faker->paragraph
    ];
});
