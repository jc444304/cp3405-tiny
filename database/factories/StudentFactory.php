<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'jcu_id' => 'jc'.$faker->unique()->randomNumber(6),
        'aboutme' => $faker->paragraph,
        'education' => $faker->sentence,
        'experience' => $faker->sentence,
        'certifications' => $faker->sentence,
        'image' => "profile/".basename($faker->image(storage_path("app/public/profile")))
    ];
});
