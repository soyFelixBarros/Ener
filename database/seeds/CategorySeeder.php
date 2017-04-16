<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
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

    	for ($i = 0; count($categories) > $i; $i++) {
    		DB::table('categories')->insert([
    			'name' => $categories[$i][0],
                'slug' => str_slug($categories[$i][0]),
    		]);
    	}
    }
}
