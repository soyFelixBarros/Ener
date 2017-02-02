<?php

use Illuminate\Database\Seeder;

class NewspapersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newspapers = [
    		['Diario Chaco', 'http://www.diariochaco.com'],
    		['Diario NORTE', 'http://www.diarionorte.com'],
    		['DataChaco.com', 'http://www.datachaco.com'],
    		['Chaco Dia Por Dia', 'http://www.chacodiapordia.com'],
    		['Diario TAG', 'https://www.diariotag.com'],
    		['diario21.tv', 'http://www.diario21.tv/notix2/'],
    		['Primera Línea', 'http://www.diarioprimeralinea.com.ar'],
    	];

    	for ($i = 0; count($newspapers) > $i; $i++) {
    		DB::table('newspapers')->insert([
    			'name' => $newspapers[$i][0],
    			'website' => $newspapers[$i][1],
    		]);
    	}
    }
}
