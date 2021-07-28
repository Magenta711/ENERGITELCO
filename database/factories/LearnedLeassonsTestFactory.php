<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\LearnedLeassonsTest;
use Faker\Generator as Faker;

$factory->define(LearnedLeassonsTest::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence,
        'responsable_id' => 48,
        'status' => 1
    ];
});
