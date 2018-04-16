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
	public function main()
	{
		$url = 'http://www.chacodiapordia.co
		m/2018/03/13/capitanich-suscribio-convenios-de-cooperacion-mutua-con-los-in
		tendentes-de-merlo-y-escobar-el-intendente-jorge-capitanich-se-reunio-con-s
		us-pares-de-las-localidades-de-merlo-gustavo-menendez-y-d/';
		return count_chars($url);
	}
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
	public function scrap()
	{
		$url = 'http://www.diariochaco.com/noticia/docentes-rechazaron-propuesta-del-gobierno-y-el-lunes-no-comienzan-las-clases-en-la';
		$xpath = '//div[@class="cuerpo"]//div[@class="field-items"]/div/*';
		$data = Crawler::extracting($url, $xpath);

		// Si no existe titulo retornar 'false'
		if ($data->count() === 0) {
			return false;
		}

		// Obtener todos los párrafos
		$paragraphs = $data->extract(array('_text'));
		$arr = array();

		foreach ($paragraphs as $p) {
			$p = Str::clean($p);
			if ($p != "") {
				$p = strlen($p) > 79  ? '<p>'.$p.'</p>' : '<h3>'.$p.'</h3>'; 
				array_push($arr, $p);
			}
		}

		$content = implode("\n", $arr);

		return $content;
	}

	public function index()
	{
		$post = Post::find(25);
		
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', env('NLU_URL'), [
			'auth' => [env('NLU_USERNAME'), env('NLU_PASSWORD')],
			'query' => [
				'version' => '2017-02-27',
				'url' => $post->url,
				'features' => 'entities'
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

	public function simily()
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