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
        'fname' => $faker->firstName,
        'lname' => $faker->name,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'identification' => $faker->numberBetween($min = 1, $max = 999999),
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// Event Type factory.
$factory->define(App\EventType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
    ];
});

// Event factory.
$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'event_uuid' => str_random(20),
        'merchant_uuid' => 1,
        'event_type_id' => $faker->numberBetween($min = 1, $max = 5),
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'description' => $faker->text,
        'city' => $faker->city,
        'street' => $faker->streetAddress,
        'building' => $faker->buildingNumber,
        'sales_close' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'event_start' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'event_end' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
