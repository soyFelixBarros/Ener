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
    		[1, 'http://www.diariochaco.com/secciones/cultura'],
            [1, 'http://www.diariochaco.com/secciones/policiales-y-judiciales'],
            [1, 'http://www.diariochaco.com/secciones/provinciales'],
            [1, 'http://www.diariochaco.com/secciones/interior'],

            // Diario NORTE
            [2, 'http://www.diarionorte.com/espectaculos/'],
            [2, 'http://www.diarionorte.com/cultura/'],
            [2, 'http://www.diarionorte.com/policiales/'],
            [2, 'http://www.diarionorte.com/politica/'],
            [2, 'http://www.diarionorte.com/locales/'],
            [2, 'http://www.diarionorte.com/interior/'],
            [2, 'http://www.diarionorte.com/voces-de-la-ciudad/'],
            [2, 'http://www.diarionorte.com/salud/'],

            // DataChaco.com
            [3, 'http://www.datachaco.com/noticias/index_seccion/Cultura'],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Policiales'],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Polit%C3%ADca'],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Actualidad'],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Educaci%C3%B3n'],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Sociedad'],

            // Chaco Dia Por Dia
            [4, 'http://www.chacodiapordia.com/category/politica/'],
            [4, 'http://www.chacodiapordia.com/category/interior/'],
            [4, 'http://www.chacodiapordia.com/category/actualidad/'],
            [4, 'http://www.chacodiapordia.com/category/ciudad/'],
            [4, 'http://www.chacodiapordia.com/category/cultura/'],
            [4, 'http://www.chacodiapordia.com/category/opinion/'],

            // Diario TAG
            [5, 'https://www.diariotag.com/tag/chaco'],
            [5, 'https://www.diariotag.com/tag/resistencia'],
            [5, 'https://www.diariotag.com/seccion/locales'],
            [5, 'https://www.diariotag.com/seccion/interior'],

            // diario21.tv
            [6, 'http://www.diario21.tv/notix2/noticias/1/chaco.html'],

            // Primera Línea
            [7, 'http://diarioprimeralinea.com.ar/politica/gran-resistencia/'],
            [7, 'http://diarioprimeralinea.com.ar/politica/interior/'],
            [7, 'http://diarioprimeralinea.com.ar/informacion-general/gran-resistencia-informacion-general/'],
            [7, 'http://diarioprimeralinea.com.ar/informacion-general/interior-informacion-general/'],
            [7, 'http://diarioprimeralinea.com.ar/policiales/'],
            [7, 'http://diarioprimeralinea.com.ar/deportes/'],

            // La Voz del Chaco
            [8, 'http://www.diariolavozdelchaco.com/notix/noticias/1/capital.htm'],
            [8, 'http://www.diariolavozdelchaco.com/notix/noticias/1/interior.htm'],
            [8, 'http://www.diariolavozdelchaco.com/notix/noticias/1/politica-provincial.htm'],

            // Chaco On Line
            [9, 'https://chacoonline.com.ar/categoria/1/sociedad'],
            [9, 'https://chacoonline.com.ar/categoria/6/ciudad'],
            [9, 'https://chacoonline.com.ar/categoria/7/provincia'],
            [9, 'https://chacoonline.com.ar/categoria/8/region'],
            [9, 'https://chacoonline.com.ar/categoria/3/cultura'],
            [9, 'https://chacoonline.com.ar/categoria/4/espectaculos'],
            [9, 'https://chacoonline.com.ar/categoria/5/educacion'],

            // Chaco Hoy
            [10, 'http://www.chacohoy.com/noticias/index_seccion/Pol%C3%ADtica'],
            [10, 'http://www.chacohoy.com/noticias/index_seccion/Info%20General'],
            [10, 'http://www.chacohoy.com/noticias/index_seccion/Cultura'],
            [10, 'http://www.chacohoy.com/noticias/index_seccion/Policiales'],
    	];

        foreach ($links as $link) {
    		DB::table($this->table)->insert([
                'source_id' => $link[0],
    			'url' => $link[1],
    		]);
    	}
    }
}
