<?php

$factory->define(App\ClipFilter::class, function (Faker\Generator $faker) {
    return [
        "filter_by" => $faker->name,
        "filters_id" => factory('App\Clip')->create(),
    ];
});
