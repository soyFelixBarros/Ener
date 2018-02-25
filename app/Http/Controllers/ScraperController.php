<?php

namespace App\Http\Controllers;

use App\Link;
use App\Image;
use Felix\Scraper\Url;
use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\PageScraping;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Manager;

class ScraperController extends Controller
{
	// public function test()
	// {
	// 	$link = Link::where('active', true)
	// 				->oldest('updated_at')
	// 				->first();
		
	// 	$link->update(['scraping' => true]);

	// 	event(new PageScraping($link));

	// 	$link->update(['scraping' => false]);
		
	// 	return 'Done.';
	// }

	// /**
	//  * Test para el scraper.
	//  *
	//  * @return Object
	//  */
	// public function testScraper()
	// {
	// 	$url = 'http://www.diario21.tv/notix2/noticia/96966_policiacuteas-detenidos-por-robo-integrariacutean-una-banda-delictiva-que-operaba-en-chaco.htm';
	// 	$xpath = '//div[@class="titulo-des"]/p';
	// 	$data = Crawler::extracting($url, $xpath);

	// 	// Si no existe titulo retornar 'false'
	// 	if (! (boolean) $data->count()) {
	// 		return false;
	// 	}

	// 	// Obtener todos los párrafos
	// 	$paragraphs = $data->extract(array('_text'));
	// 	$arr = array();

	// 	foreach ($paragraphs as $p) {
	// 		$p = Str::clean($p);
	// 		if ($p != "") {
	// 			array_push($arr, $p);
	// 		}
	// 	}

	// 	$str = implode("\n\n", $arr);

	// 	return $str;
	// }

	public function index()
	{
		$text = "La obra contempla la pavimentación, desagües pluviales, iluminación y señalización (vertical y horizontal) de calles de la Chacra 192 comprendidas en los tramos Sargento Cabral, entre José Hernández y Avenida Nicolás Rojas Acosta; Francisco Solano, entre avenida Laprida y Sargento Cabral y Padre Distorto, entre avenida Laprida y Sargento Cabral.
		El municipio capitalino encara de esta manera un proyecto integral para la recuperación y mejoramiento de un barrio emblemático de la ciudad, llevando a los vecinos los beneficios que conlleva la realización de una nueva obra de pavimento urbano.
		La obra contempla un total de siete cuadras con sus correspondientes obras complementarias de desagües pluviales, alumbrado público led, señalización vial y rampas urbanas para discapacitados. El plazo de ejecución está fijado en 240 días, pero se prevé concluirla antes si acompañan las condiciones climáticas. Participaron de la firma de la licitación el secretario de Economía, Federico Muñoz Femenía y el subsecretario de Legal y Técnica, Jorge Alegre.
		Mejoras sustanciales para la conectividad
		El pavimento urbano implica mejoras sustanciales para la transitabilidad y la conectividad para esta zona de Villa Prosperidad. En este caso particular tienen particular importancia la realización de obras complementarias, especialmente los desagües pluviales al tratarse de una zona con una fuerte incidencia hídrica por la presencia de las lagunas.
		Participaron del proceso licitatorio tres empresas (Tecmasa S.A., Vidal y Zening S.R.L. y Novelli S.A.C.I.F.I.C.A.), quienes presentaron sus respectivas ofertas para la realización del trabajo. Después del análisis correspondiente de las ofertas y cumplimentando todos los requisitos establecidos se adjudicó la licitación a la firma Tecmasa S.A.";
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', env('NLU_URL'), [
			'auth' => [env('NLU_USERNAME'), env('NLU_PASSWORD')],
			'query' => [
				'version' => '2017-02-27',
				'text' => $text,
				'features' => 'sentiment,keywords,entities',
				'keywords.sentiment' => true
			]
		]);
		
		return $res->getBody();
	}

	public function scraper()
	{
		return Url::normalize('https://www.diariotag.com/sites/www.diariotag.com/files/styles/630x430/public/news_featured_image/mm_dp_59986_59986.jpg?itok=7jb_LdUx');
		$url = 'http://diarioprimeralinea.com.ar/bertolt-brecht-favaloro-y-el-aborto/';
		$xpath = '//div[@class="td-post-featured-image"]//@href';

		$data = Crawler::extracting($url, $xpath);

		// Si no existe titulo retornar 'false'
		if ($data->count() === 0) {
			return false;
		}

		$src = Url::normalize(rawurlencode($data->text()), 'http://diarioprimeralinea.com.ar');
		$hash = md5_file($src);
		$file = $hash.'.jpg';
		$dir = public_path('/uploads/images/');
		$path = $dir.$file;

		// Obtenemos la imagen desde la base de datos
		$image = Image::where('hash', $hash)->first();

		// Si no existe, crearlas
		if ($image === null) {
			// Guardar la imagen en el servidor
			$manager = Manager::make($src)->save($path);

			// Guardar en la base de datos
			$image = new Image();
			$image->file = $file;
			$image->width = $manager->width();
			$image->height = $manager->height();
			$image->hash = $hash;
			$image->save();
			
			return 'Creamos la imagen nueva';
		}

        return $image;
	}
}