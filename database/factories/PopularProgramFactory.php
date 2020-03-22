<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PopularProgram;
use App\Program;
use Faker\Generator as Faker;

$factory->define(PopularProgram::class, function (Faker $faker) {
    return [
        'program_id' => function() {
    		return  factory(Program::class)->create()->id;
		},
    ];
});
