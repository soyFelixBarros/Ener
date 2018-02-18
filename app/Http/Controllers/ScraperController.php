<?php

namespace App\Http\Controllers;

use App\Link;
use Felix\Scraper\Url;
use Felix\Scraper\Str;
use Felix\Scraper\Crawler;
use App\Events\PageScraping;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
	public function test()
	{
		$link = Link::where('active', true)
					->oldest('updated_at')
					->first();
		
		$link->update(['scraping' => true]);

		event(new PageScraping($link));

		$link->update(['scraping' => false]);
		
		return 'Done.';
	}

	/**
	 * Test para el scraper.
	 *
	 * @return Object
	 */
	public function index()
	{
		$data = Crawler::extracting('https://www.diariotag.com/tag/chaco', '//article/h1/a');

		// Si no existe titulo retornar 'false'
		if (! (boolean) $data->count()) {
			return false;
		}

		// Normalizar url
		$url = new Url($data->attr('href'));

		$data = Crawler::extracting($url->normalize('https://www.diariotag.com'), '//h1');

		// Si no existe titulo retornar 'false'
		if (! (boolean) $data->count()) {
			return 'Nada :(';
		}
		

		return Str::clean($data->text())->get();
	}
}