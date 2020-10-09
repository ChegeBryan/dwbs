<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'employer_id' => 1,
        'category' => $faker->randomElement($array = array('Shamba Boy', 'House help')),
        'title' => $faker->word,
        'type' => $faker->randomElement($array = array('Full Time', 'Part Time')),
        'description' => $faker->sentence,
        'salary' => $faker->numberBetween(1000, 10000),
        'county' => $faker->state,
        'town' => $faker->city,
        'address' => $faker->address,
    ];
});
