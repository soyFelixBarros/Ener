<?php

namespace App\Http\Controllers;

use App\Link;
use App\Image;
use App\Post;
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
	public function scraper()
	{
		$url = 'http://www.diario21.tv/notix2/noticia/96966_policiacuteas-detenidos-por-robo-integrariacutean-una-banda-delictiva-que-operaba-en-chaco.htm';
		$xpath = '//div[@class="rela-titu"]/a';
		$data = Crawler::extracting($url, $xpath);

		// Si no existe titulo retornar 'false'
		if ($data->count() === 0) {
			return false;
		}

		$href = $data->attr('href');

		return Url::normalize($href, 'http://www.diario21.tv/notix2/');
	}

	public function anality()
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

	public function image()
	{
		$file = rand().'.jpg';
		$dir = public_path('/uploads/images/');
		$path = $dir.$file;

		$img = Manager::make('http://www.chacodiapordia.com/wp-content/uploads/2018/02/PLP_GrupoMeichtry-696x455.jpg');
		if ($img->width() > 600) {
			$img->widen(600);
		}
		$img->save($path);

		return $img->basename;
		// // Si no existe, crearlas
		// if ($image === null) {
		// 	// Guardar la imagen en el servidor
		// 	$manager = Manager::make($src)->save($path);

		// 	// Guardar en la base de datos
		// 	$image = new Image();
		// 	$image->file = $file;
		// 	$image->width = $manager->width();
		// 	$image->height = $manager->height();
		// 	$image->hash = $hash;
		// 	$image->save();
			
		// 	return 'Creamos la imagen nueva';
		// }

		// return $image;
	}

	public function search()
	{
		$posts = \App\Post::search('Domingo Peppo')->get();
		return $posts;
	}

	public function compare($first, $second)
	{
		$first = strtolower($first);
		$second = strtolower($second);
		$levenshtein = levenshtein($first, $second);

		similar_text($first, $second, $percent);
		
		return $levenshtein < 40 && $percent > 60 ? true : false;
	}

	public function index()
	{
		$title = 'Nadia Garcia Amud fue a la Legislatura con una botella de Sprite';
		$posts = Post::where('newspaper_id', 6)->where('status', 'publish')->get();
		$results = array('compare' => $title);

		foreach ($posts as $post) {
			array_push($results, [
				'title' => $post->title,
				'update' => $this->compare($title, $post->title)
			]);
		}


		return $results;
	}
}