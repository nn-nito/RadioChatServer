<?php

/** @var Factory $factory */

use App\Radio;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Radio::class, function (Faker $faker) {
    return [
        'same_id' => $faker->randomNumber(),
		'title' => $faker->randomElement(),
		'body' => $faker->randomElement(),
		'day_of_week' => $faker->randomNumber(),
		'on_air_start_time' => $faker->time(),
		'on_air_end_time' => $faker->time(),
		'is_main_air' => true,
		'display_order' => 0,
    ];
});
