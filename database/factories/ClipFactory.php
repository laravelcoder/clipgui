<?php

$factory->define(App\Clip::class, function (Faker\Generator $faker) {
    return [
        "label" => $faker->name,
        "description" => $faker->name,
        "industry_id" => factory('App\Industry')->create(),
        "brand_id" => factory('App\Brand')->create(),
        "states_id" => factory('App\State')->create(),
        "products_id" => factory('App\Product')->create(),
        "notes" => $faker->name,
    ];
});
