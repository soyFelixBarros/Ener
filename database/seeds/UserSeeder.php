<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            [
                'role_id' => 1,
            	'name' => 'Felix Barros',
            	'email' => 'soyFelixBarros@gmail.com',
            	'password' => bcrypt('admin'),
            ],
        ]);
    }
}
