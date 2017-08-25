<?php

use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Link())->getTable();
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
        
            // Diario Chaco
    		[1, 'http://www.diariochaco.com/secciones/cultura', 8],
            [1, 'http://www.diariochaco.com/secciones/policiales-y-judiciales', 2],
            [1, 'http://www.diariochaco.com/secciones/provinciales', null],
            [1, 'http://www.diariochaco.com/secciones/interior', null],

            // Diario NORTE
            [2, 'http://www.diarionorte.com/espectaculos/', 7],
            [2, 'http://www.diarionorte.com/cultura/', 8],
            [2, 'http://www.diarionorte.com/policiales/', 2],
            [2, 'http://www.diarionorte.com/politica/', 1],
            [2, 'http://www.diarionorte.com/locales/', null],
            [2, 'http://www.diarionorte.com/interior/', null],

            // DataChaco.com
            [3, 'http://www.datachaco.com/noticias/index_seccion/Cultura', 8],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Policiales', 2],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Polit%C3%ADca', 1],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Actualidad', null],

            // Chaco Dia Por Dia
            [4, 'http://www.chacodiapordia.com/category/politica/', 1],
            [4, 'http://www.chacodiapordia.com/category/interior/', null],
            [4, 'http://www.chacodiapordia.com/category/actualidad/', null],
            [4, 'http://www.chacodiapordia.com/category/ciudad/', null],
            [4, 'http://www.chacodiapordia.com/category/cultura/', 8],

            // Diario TAG
            [5, 'https://www.diariotag.com/tag/chaco', null],
            [5, 'https://www.diariotag.com/tag/resistencia', null],
            [5, 'https://www.diariotag.com/seccion/locales', null],
            [5, 'https://www.diariotag.com/seccion/interior', null],

            // diario21.tv
            [6, 'http://www.diario21.tv/notix2/noticias/1/chaco.html', null],

            // Primera Línea
            [7, 'http://www.diarioprimeralinea.com.ar/politica/', 1],
            [7, 'http://www.diarioprimeralinea.com.ar/informacion-general/', null],
            [7, 'http://www.diarioprimeralinea.com.ar/policiales/', 2],
            [7, 'http://www.diarioprimeralinea.com.ar/deportes/', 9],
            [7, 'http://www.diarioprimeralinea.com.ar/cultura-espectaculos/', 8],
            [7, 'http://www.diarioprimeralinea.com.ar/opinion/', 6]
    	];

        foreach ($links as $link) {
    		DB::table($this->table)->insert([
                'newspaper_id' => $link[0],
    			'url' => $link[1],
                'category_id' => $link[2]
    		]);
    	}
    }
}
