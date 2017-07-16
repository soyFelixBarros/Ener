<?php

namespace App\Http\Controllers\Admin;

use App\Scraper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScrapersController extends Controller
{
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