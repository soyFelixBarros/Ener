<?php

use Illuminate\Database\Seeder;

class NewspaperSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Newspaper())->getTable();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newspapers = [
    		['Diario Chaco', 'http://www.diariochaco.com', 'diariochaco.com'],
    		['Diario NORTE', 'http://www.diarionorte.com', 'diarionorte.com'],
    		['DataChaco.com', 'http://www.datachaco.com', 'datachaco.com'],
    		['Chaco Dia Por Dia', 'http://www.chacodiapordia.com', 'chacodiapordia.com'],
    		['Diario TAG', 'https://www.diariotag.com', 'diariotag.com'],
    		['diario21.tv', 'http://www.diario21.tv/notix2/', 'diario21.tv'],
    		['Primera Línea', 'http://www.diarioprimeralinea.com.ar', 'diarioprimeralinea.com.ar'],
    	];

    	foreach ($newspapers as $newspaper) {
    		DB::table($this->table)->insert([
                'country_id' => 10,
                'province_id' => 3,
    			'name' => $newspaper[0],
                'website' => $newspaper[1],
                'host' => $newspaper[2],
                'slug' => str_slug($newspaper[0]),
    		]);
    	}
    }
}
