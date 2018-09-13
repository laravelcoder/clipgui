<?php

$factory->define(App\Clip::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "original_name" => $faker->name,
        "disk" => $faker->name,
        "path" => $faker->name,
        "label" => $faker->name,
        "description" => $faker->name,
        "industry_id" => factory('App\Industry')->create(),
        "brand_id" => factory('App\Brand')->create(),
        "states_id" => factory('App\State')->create(),
        "products_id" => factory('App\Product')->create(),
        "notes" => $faker->name,
        "converted_for_downloading_at" => $faker->date("m/d/Y H:i:s", $max = 'now'),
        "converted_for_streaming_at" => $faker->date("m/d/Y H:i:s", $max = 'now'),
    ];
});
