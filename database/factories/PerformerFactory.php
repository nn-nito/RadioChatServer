<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Performer;
use Faker\Generator as Faker;

$factory->define(Performer::class, function (Faker $faker) {
    return [
		'program_id' => $faker->randomNumber(),
		'name' => $faker->name,
		'name_kana' => $faker->name,
    ];
});
