<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
    		['Admin'],
            ['Suscriptor']
    	];

    	for ($i = 0; count($roles) > $i; $i++) {
    		DB::table('roles')->insert([
                'name' => $roles[$i][0],
                'slug' => str_slug($roles[$i][0]),
    		]);
    	}
    }
}
