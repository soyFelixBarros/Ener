<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Category())->getTable();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
    		['Política'],
            ['Policiales'],
            ['Economía'],
            ['Producción'],
            ['Sociedad'],
            ['Opinión'],
            ['Espectáculos'],
            ['Cultura'],
            ['Deportes'],
            ['Salud'],
            ['Educación']
    	];

    	 foreach ($categories as $category) {
    		DB::table($this->table)->insert([
    			'name' => $category[0],
                'slug' => str_slug($category[0]),
    		]);
    	}
    }
}
