<?php

use Faker\Generator as Faker;

$factory->define(\App\Activity::class, function (Faker $faker) {
    return [
        'user_id'  => function ($data) {
            return factory(\App\User::class)->create();
        },
        'title'    => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'schedule' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null),
        'content'  => $faker->text(50)
    ];
});
