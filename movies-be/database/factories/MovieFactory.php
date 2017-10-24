<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
		'name' => $faker->name,
        'director' => $faker->name,
        'image_url' => $faker->imageUrl($width = rand(640, 1980), $height = rand(480, 1080)),
        'duration' => $faker->biasedNumberBetween($min = 90, $max = 180),
        'release_date' => $faker->dateTimeThisCentury($max = 'now', $timezone = date_default_timezone_get()),
        'genres' => $faker->words($nb = rand(1,4), $asText = true),
    ];
});
