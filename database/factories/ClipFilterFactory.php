<?php

$factory->define(App\ClipFilter::class, function (Faker\Generator $faker) {
    return [
        "filter_by" => $faker->name,
    ];
});
