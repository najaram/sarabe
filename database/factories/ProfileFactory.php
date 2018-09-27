<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'member_id' => function ($data) {
            return factory(\App\Member::class)->create();
        },
        'church_id' => uniqid(),
        'locale'    => $faker->randomElement(['platero', 'spcc', 'srcc', 'binan']),
        'district'  => $faker->randomElement(['north', 'south', 'east', 'west']),
        'division'  => $faker->randomElement(['lbmr', 'metro', 'central']),
    ];
});

$factory->state(App\Profile::class, 'group', function ($faker) {
    return [
        'group' => $faker->randomElement(['kktk', 'lingap', 'gco', 'kapi'])
    ];
});
