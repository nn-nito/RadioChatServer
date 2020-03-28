<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Program;
use Faker\Generator as Faker;

$factory->define(Program::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'url' => $faker->imageUrl(),
		'filename' => $faker->randomElement(),
		'info' => $faker->randomElement(),
		'account' => $faker->randomElement(),
	];
});
