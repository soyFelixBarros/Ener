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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(NewspaperSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ScrapingSeeder::class);
        $this->call(LinkSeeder::class);
    }
}
