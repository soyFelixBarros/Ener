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
    		[10, 'Buenos Aires'],
            [10, 'Catamarca'],
            [10, 'Chaco'],
            [10, 'Chubut'],
            [10, 'Capital Federal'], // Ciudad Autónoma de Buenos Aires
            [10, 'Corrientes'],
            [10, 'Córdoba'],
            [10, 'Entre Ríos'],
            [10, 'Formosa'],
            [10, 'Jujuy'],
            [10, 'La Pampa'],
            [10, 'La Rioja'],
            [10, 'Mendoza'],
            [10, 'Misiones'],
            [10, 'Neuquén'],
            [10, 'Río Negro'],
            [10, 'Salta'],
            [10, 'San Juan'],
            [10, 'San Luis'],
            [10, 'Santa Cruz'],
            [10, 'Santa Fe'],
            [10, 'Santiago del Estero'],
            [10, 'Tierra del Fuego'],
            [10, 'Tucumán'],
    	];

    	for ($i = 0; count($provinces) > $i; $i++) {
    		DB::table('provinces')->insert([
                'country_id' => $provinces[$i][0],
    			'name' => $provinces[$i][1],
    		]);
    	}
    }
}
