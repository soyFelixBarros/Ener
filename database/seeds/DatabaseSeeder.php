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
        $this->call(NewspaperSeeder::class);
        $this->call(LinkSeeder::class);
        $this->call(CountrySeeder::class);
    }
}
