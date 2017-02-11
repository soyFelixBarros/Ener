<?php

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            // Argentina
    		['AR', 'AR-B', 'Buenos Aires'],
            ['AR', 'AR-K', 'Catamarca'],
            ['AR', 'AR-H', 'Chaco'],
            ['AR', 'AR-U', 'Chubut'],
            ['AR', 'AR-C', 'Capital Federal'], // Ciudad Autónoma de Buenos Aires
            ['AR', 'AR-X', 'Córdoba'],
            ['AR', 'AR-W', 'Corrientes'],
            ['AR', 'AR-E', 'Entre Ríos'],
            ['AR', 'AR-P', 'Formosa'],
            ['AR', 'AR-Y', 'Jujuy'],
            ['AR', 'AR-L', 'La Pampa'],
            ['AR', 'AR-F', 'La Rioja'],
            ['AR', 'AR-M', 'Mendoza'],
            ['AR', 'AR-N', 'Misiones'],
            ['AR', 'AR-Q', 'Neuquén'],
            ['AR', 'AR-R', 'Río Negro'],
            ['AR', 'AR-A', 'Salta'],
            ['AR', 'AR-J', 'San Juan'],
            ['AR', 'AR-D', 'San Luis'],
            ['AR', 'AR-Z', 'Santa Cruz'],
            ['AR', 'AR-S', 'Santa Fe'],
            ['AR', 'AR-G', 'Santiago del Estero'],
            ['AR', 'AR-V', 'Tierra del Fuego'],
            ['AR', 'AR-T', 'Tucumán'],
    	];

    	for ($i = 0; count($provinces) > $i; $i++) {
    		DB::table('provinces')->insert([
                'country_code' => $provinces[$i][0],
                'code' => $provinces[$i][1],
    			'name' => $provinces[$i][2],
    		]);
    	}
    }
}
