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
    		[1, 'http://www.diariochaco.com/secciones/cultura', null],
            [1, 'http://www.diariochaco.com/secciones/policiales-y-judiciales', 2],
            [1, 'http://www.diariochaco.com/secciones/provinciales', null],
            [1, 'http://www.diariochaco.com/secciones/interior', null],

            // Diario NORTE
            [2, 'http://www.diarionorte.com/espectaculos/', null],
            [2, 'http://www.diarionorte.com/cultura/', null],
            [2, 'http://www.diarionorte.com/policiales/', 2],
            [2, 'http://www.diarionorte.com/politica/', 1],
            [2, 'http://www.diarionorte.com/locales/', null],
            [2, 'http://www.diarionorte.com/interior/', null],
            [2, 'http://www.diarionorte.com/voces-de-la-ciudad/', null],
            [2, 'http://www.diarionorte.com/salud/', null],

            // DataChaco.com
            [3, 'http://www.datachaco.com/noticias/index_seccion/Cultura', null],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Policiales', 2],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Polit%C3%ADca', 1],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Actualidad', null],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Educaci%C3%B3n', null],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Sociedad', null],

            // Chaco Dia Por Dia
            [4, 'http://www.chacodiapordia.com/category/politica/', 1],
            [4, 'http://www.chacodiapordia.com/category/interior/', null],
            [4, 'http://www.chacodiapordia.com/category/actualidad/', null],
            [4, 'http://www.chacodiapordia.com/category/ciudad/', null],
            [4, 'http://www.chacodiapordia.com/category/cultura/', null],
            [4, 'http://www.chacodiapordia.com/category/opinion/', null],

            // Diario TAG
            [5, 'https://www.diariotag.com/tag/chaco', null],
            [5, 'https://www.diariotag.com/tag/resistencia', null],
            [5, 'https://www.diariotag.com/seccion/locales', null],
            [5, 'https://www.diariotag.com/seccion/interior', null],

            // diario21.tv
            [6, 'http://www.diario21.tv/notix2/noticias/1/chaco.html', null],

            // Primera Línea
            [7, 'http://diarioprimeralinea.com.ar/politica/gran-resistencia/', 1],
            [7, 'http://diarioprimeralinea.com.ar/politica/interior/', 1],
            [7, 'http://diarioprimeralinea.com.ar/informacion-general/gran-resistencia-informacion-general/', null],
            [7, 'http://diarioprimeralinea.com.ar/informacion-general/interior-informacion-general/', null],
            [7, 'http://diarioprimeralinea.com.ar/policiales/', 2],
            [7, 'http://diarioprimeralinea.com.ar/deportes/', 3]
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
