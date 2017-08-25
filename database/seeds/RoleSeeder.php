<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Role())->getTable();
    }

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

    	foreach ($roles as $role) {
    		DB::table($this->table)->insert([
                'name' => $role[0],
                'slug' => str_slug($role[0]),
    		]);
    	}
    }
}
