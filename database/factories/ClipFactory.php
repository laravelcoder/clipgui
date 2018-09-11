<?php

$factory->define(App\Clip::class, function (Faker\Generator $faker) {
    return [
        "label" => $faker->name,
        "description" => $faker->name,
        "notes" => $faker->name,
        "industry_id" => factory('App\Industry')->create(),
        "brand_id" => factory('App\Brand')->create(),
    ];
});
