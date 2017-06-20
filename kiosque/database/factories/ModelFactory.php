<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Publication::class, function (Faker\Generator $faker) {
    return [
        'titre' => $faker->sentence(),
        'nbnum' => $faker->numberBetween(10,12),
        'details' => $faker->sentence(),
        'photo' => $faker->sentence(),
        'photo' => $faker->sentence(),
        'prix' => $faker->numberBetween(0,50),
    ];
});