<?php

namespace App\Http\Controllers;

use Felix\Scraper\Url;
use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
	/**
	 * Comenzaro con el proceso de raspado web.
	 *
	 * @return Object
	 */
	public function index()
	{
		$data = Crawler::extracting('http://www.diario21.tv/notix2/noticias/1/chaco.html', '//div[@class="rela-titu"]/a');

		// Si no existe titulo retornar 'false'
		if (! (boolean) $data->count()) {
			return false;
		}

		// Normalizar url
		$url = new Url($data->attr('href'));

		$data = Crawler::extracting($url->normalize($data->getBaseHref()), '//a[@class="tit-cata"]');

		// Si no existe titulo retornar 'false'
		if (! (boolean) $data->count()) {
			return 'Nada :(';
		}
		

		return Str::clean($data->text())->get();
	}
}