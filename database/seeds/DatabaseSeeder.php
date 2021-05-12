<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(PositionTableSeed::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeed::class);
        $this->call(UserTableSeed::class);
        $this->call(makeups_rfSeed::class);
    }
}
