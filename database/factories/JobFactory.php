<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'salary' => sprintf('%01.2f', $faker->numberBetween(2,15)*10000),
        'description' => $faker->paragraph,
        'type' => $faker->randomElement(['Part-Time','Full-Time','Casual']),
        'location' => $faker->city,
        'industry' => $faker->words(2,true)
    ];
});
