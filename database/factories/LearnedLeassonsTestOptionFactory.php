<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LearnedLeassonsTest;
use App\Models\LearnedLeassonsTestOption;
use Faker\Generator as Faker;

$factory->define(LearnedLeassonsTestOption::class, function (Faker $faker) {
    LearnedLeassonsTest::get()->each(function ($leasson) use($faker)
    {
        $num = rand(2,5);
        $resp = rand(1,$num);
        for ($i=1; $i <= $num ; $i++) { 
            LearnedLeassonsTestOption::create([
                'text_answer' => $faker->sentence,
                'num' => $i,
                'answer' => $i == $resp ? 1 : 0,
                'status' => 1,
                'test_id' => $leasson->id
            ]);
        }
    });
});
