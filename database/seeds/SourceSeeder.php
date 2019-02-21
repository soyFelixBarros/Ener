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
    		['Diario Chaco', 'http://www.diariochaco.com', 8],
    		['Diario NORTE', 'http://www.diarionorte.com', 9],
    		['DataChaco.com', 'http://www.datachaco.com', 10],
    		['Chaco Dia Por Dia', 'http://www.chacodiapordia.com', 11],
    		['Diario TAG', 'https://www.diariotag.com', 12],
    		['diario21.tv', 'http://www.diario21.tv/notix2/', 13],
            ['Primera Línea', 'http://www.diarioprimeralinea.com.ar', 14],
            ['La Voz del Chaco', 'http://www.diariolavozdelchaco.com/notix/', 15],
            ['Chaco On Line', 'https://chacoonline.com.ar', 16],
            ['Chaco Hoy', 'http://www.chacohoy.com', 17],
    	];

    	foreach ($sources as $source) {
    		DB::table($this->table)->insert([
    			'name'   => $source[0],
    			'url'    => $source[1],
    			'tax_id' => $source[2],
    		]);
    	}
    }
}
