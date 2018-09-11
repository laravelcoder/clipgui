<?php

$factory->define(App\State::class, function (Faker\Generator $faker) {
    return [
        "state" => $faker->name,
        "slug" => $faker->name,
    ];
});
