<?php

use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
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

            // DataChaco.com
            [3, 'http://www.datachaco.com/noticias/index_seccion/Cultura'],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Policiales'],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Polit%C3%ADca'],
            [3, 'http://www.datachaco.com/noticias/index_seccion/Actualidad'],

            // Chaco Dia Por Dia
            [4, 'http://www.chacodiapordia.com/politica'],
            [4, 'http://www.chacodiapordia.com/economia'],
            [4, 'http://www.chacodiapordia.com/produccion'],
            [4, 'http://www.chacodiapordia.com/sociedad'],
            [4, 'http://www.chacodiapordia.com/policiales'],
            [4, 'http://www.chacodiapordia.com/cultura'],
            [4, 'http://www.chacodiapordia.com/deportes'],

            // Diario TAG
            [5, 'https://www.diariotag.com/seccion/policiales'],
            [5, 'https://www.diariotag.com/seccion/locales'],
            [5, 'https://www.diariotag.com/seccion/interior'],

            // diario21.tv
            [6, 'http://www.diario21.tv/notix2/noticias/1/chaco.html'],

            // Primera Línea
            [7, 'http://www.diarioprimeralinea.com.ar/politica/'],
            [7, 'http://www.diarioprimeralinea.com.ar/informacion-general/'],
            [7, 'http://www.diarioprimeralinea.com.ar/policiales/'],
            [7, 'http://www.diarioprimeralinea.com.ar/cultura-espectaculos/'],
    	];

    	for ($i = 0; count($links) > $i; $i++) {
    		DB::table('links')->insert([
                'newspaper_id' => $links[$i][0],
    			'url' => $links[$i][1],
    		]);
    	}
    }
}
