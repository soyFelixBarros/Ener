<?php

namespace App\Http\Controllers\Admin;

use App\Scraper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScrapersController extends Controller
{
	/**
	 * Metodo para mostrar un formulario.
	 *
	 * @return void
	 */
	public function page(Request $request)
	{
		$url = $request->input('url');
		return view('admin.scrapers.page', array(
			'url' => $url
		));
	}

	/**
	 * Metodo para mostrar un formulario.
	 *
	 * @return void
	 */
	public function evaluatePage(Request $request)
	{
		// Decodifica una cadena cifrada como URL
        $url = urldecode($request->url);

        // Transmite un fichero entero a una cadena
        $html = @file_get_contents($url);

		$crawler = new \Symfony\Component\DomCrawler\Crawler($html);
		$results =  $crawler->evaluate($request->filter);

		return view('admin.scrapers.page', array(
			'results' => $results,
			'url' => $url,
			'filter' => $request->filter,
		));
	}

	/**
	 * Vista con el formulario para editar los datos de un scraper.
	 *
	 * @return Object
	 */
	public function edit($id)
	{
		$scraper = Scraper::withoutGlobalScopes()->find($id);

		return view('admin.scrapers.edit')->with('scraper', $scraper);
	}

	/**
	 * Metodo para actualizar los datos del scraper.
	 *
	 * @return void
	 */
	public function update($id, Request $request)
	{
		$data = $request->except(['_token']);

		$scraper = Scraper::withoutGlobalScopes()->find($id);

		$scraper->update($data);

		return redirect()
			   ->route('admin_scrapers_edit', ['id' => $id])
			   ->with('status', 'Scraper updated!');
	}
}