<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(FilterSeeder::class);
        $this->call(LinkSeeder::class);
    }
}
