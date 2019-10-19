<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'faculty' => $faker->words(2),
        'image' => $faker->image(storage_path("app/public/profile"))
    ];
});
