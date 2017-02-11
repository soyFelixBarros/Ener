<?php

use Illuminate\Database\Seeder;

class NewspaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newspapers = [
    		['AR-H', 'Diario Chaco', 'http://www.diariochaco.com'],
    		['AR-H', 'Diario NORTE', 'http://www.diarionorte.com'],
    		['AR-H', 'DataChaco.com', 'http://www.datachaco.com'],
    		['AR-H', 'Chaco Dia Por Dia', 'http://www.chacodiapordia.com'],
    		['AR-H', 'Diario TAG', 'https://www.diariotag.com'],
    		['AR-H', 'diario21.tv', 'http://www.diario21.tv/notix2'],
    		['AR-H', 'Primera Línea', 'http://www.diarioprimeralinea.com.ar'],
    	];

    	for ($i = 0; count($newspapers) > $i; $i++) {
    		DB::table('newspapers')->insert([
                'province_code' => $newspapers[$i][0],
    			'name' => $newspapers[$i][1],
    			'website' => $newspapers[$i][2],
    		]);
    	}
    }
}
