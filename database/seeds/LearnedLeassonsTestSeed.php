<?php

use Illuminate\Database\Seeder;

class LearnedLeassonsTestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\LearnedLeassonsTest::class, 1)->create();
    }
}
