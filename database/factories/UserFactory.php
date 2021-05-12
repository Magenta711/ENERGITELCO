<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'direccion' => $faker->address,
        'cedula' => $faker->unique()->buildingNumber,
        'telefono' => $faker->buildingNumber,
        'area' => $faker->sentence,
        'position_id' => rand(2,18),
        'state' => 1,
        'foto' => 'face.png',
    ];
});
// $2y$10$DqC/B3GJRqVO4HhqxtJi7elS7GAhLI2x9qqHzMpTPvV31/lpI3zBq