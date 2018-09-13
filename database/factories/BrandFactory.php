<?php

$factory->define(App\Brand::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
