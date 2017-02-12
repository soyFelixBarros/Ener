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
        $this->call(CountrySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(NewspaperSeeder::class);
        $this->call(ScrapingSeeder::class);
        $this->call(LinkSeeder::class);
    }
}
