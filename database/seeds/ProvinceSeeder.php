<?php

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Province())->getTable();
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            // Argentina
    		['AR-B', 'Buenos Aires'],
            ['AR-K', 'Catamarca'],
            ['AR-H', 'Chaco'],
            ['AR-U', 'Chubut'],
            ['AR-C', 'Capital Federal'], // Ciudad Autónoma de Buenos Aires
            ['AR-X', 'Córdoba'],
            ['AR-W', 'Corrientes'],
            ['AR-E', 'Entre Ríos'],
            ['AR-P', 'Formosa'],
            ['AR-Y', 'Jujuy'],
            ['AR-L', 'La Pampa'],
            ['AR-F', 'La Rioja'],
            ['AR-M', 'Mendoza'],
            ['AR-N', 'Misiones'],
            ['AR-Q', 'Neuquén'],
            ['AR-R', 'Río Negro'],
            ['AR-A', 'Salta'],
            ['AR-J', 'San Juan'],
            ['AR-D', 'San Luis'],
            ['AR-Z', 'Santa Cruz'],
            ['AR-S', 'Santa Fe'],
            ['AR-G', 'Santiago del Estero'],
            ['AR-V', 'Tierra del Fuego'],
            ['AR-T', 'Tucumán'],
    	];

        foreach ($provinces as $province) {
    		DB::table($this->table)->insert([
                'country_id' => 10,
                'code' => $province[0],
    			'name' => $province[1],
                'slug' => str_slug($province[1]),
    		]);
    	}
    }
}
