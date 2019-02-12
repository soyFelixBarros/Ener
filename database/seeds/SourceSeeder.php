<?php

use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Source())->getTable();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
    		['Diario Chaco', 'http://www.diariochaco.com'],
    		['Diario NORTE', 'http://www.diarionorte.com'],
    		['DataChaco.com', 'http://www.datachaco.com'],
    		['Chaco Dia Por Dia', 'http://www.chacodiapordia.com'],
    		['Diario TAG', 'https://www.diariotag.com'],
    		['diario21.tv', 'http://www.diario21.tv/notix2/'],
            ['Primera Línea', 'http://www.diarioprimeralinea.com.ar'],
            ['La Voz del Chaco', 'http://www.diariolavozdelchaco.com/notix/'],
            ['Chaco On Line', 'https://chacoonline.com.ar'],
            ['Chaco Hoy', 'http://www.chacohoy.com'],
    	];

    	foreach ($sources as $source) {
    		DB::table($this->table)->insert([
    			'name' => $source[0],
                'url' => $source[1],
    		]);
    	}
    }
}
