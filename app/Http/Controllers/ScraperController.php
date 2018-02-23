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

	// public function analiticy()
	// {
	// 	$text = "Luego del escándalo ocasionado en los Carnavales Correntinos, por una supuesta trifulca entre la diputada García Amud y el medallista olímpico Santiago Crismanich, la diputada Pillati Vergara salió en redes sociales a respaldar a la legisladora García Amud, a través de un comentario en la red social Facebook.
	// 	El comentario, reza así: “Me encantaría que igual indignación demostraran por la violencia de género, incumplimiento de cuota alimentaria y desmanes varios (rayanos con el delito), cometidos (y de público conocimiento) por los mismos que promueven el caso García Amud, Harta de tanta hipocresía”.
	// 	Además, exaltó las intencionalidades políticas detrás del pedido de remoción de García Amud, expresando que es “tan trucho como interesado”.";
	// 	$client = new \GuzzleHttp\Client();
	// 	$res = $client->request('GET', env('NLU_URL'), [
	// 		'auth' => [env('NLU_USERNAME'), env('NLU_PASSWORD')],
	// 		'query' => [
	// 			'version' => '2017-02-27',
	// 			'text' => $text,
	// 			'features' => 'sentiment,keywords,entities',
	// 			'keywords.sentiment' => true
	// 		]
	// 	]);
		
	// 	return $res->getBody();
	// }

	public function index()
	{
		$url = 'http://www.datachaco.com/noticias/view/105090';
		$xpath = '//div[@class="carousel-inner"]/div/img/@data-original';

		$data = Crawler::extracting($url, $xpath);

		// Si no existe titulo retornar 'false'
		if ($data->count() === 0) {
			return false;
		}

		$url = new Url($data->text());
		$src = $url->normalize('http://www.datachaco.com');
		// $src = $url->addScheme();
		$hash = md5_file($src);
		$file = $hash.'.jpg';
		$dir = public_path('/uploads/images/');
		$path = $dir.$file;

		// Obtenemos la imagen desde la base de datos
		$image = Image::where('hash', $hash)->first();
		// 'http://www.chacodiapordia.com/wp-content/uploads/2018/02/01-CONVENIO-%E2%80%93-LAPACHITO-3.jpg'
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