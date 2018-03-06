<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\User())->getTable();
    }

	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table($this->table)->insert([
            [
                'role_id' => 1,
            	'name' => 'Admin',
            	'email' => 'admin@gmail.com',
            	'password' => bcrypt('admin'),
            ],
            [
                'role_id' => 2,
            	'name' => 'Demo',
            	'email' => 'demo@gmail.com',
            	'password' => bcrypt('demo'),
            ],
        ]);
    }
}
