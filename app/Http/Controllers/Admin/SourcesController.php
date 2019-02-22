<?php

namespace App\Http\Controllers\Admin;

use App\Source;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SourcesController extends Controller
{
	/**
	 * Vista con todos las fuentes.
	 *
	 * @return Object
	 */
	public function index(Request $request)
	{
		$sources = Source::oldest('name')->paginate(40);

		return view('admin.sources.index', [
			'sources' => $sources,
		]);
	}

    /**
	 * Vista con el formulario para editar una fuente
	 *
	 * @return Object
	 */
	public function edit($id)
	{
		$source = Source::find($id);

		return view('admin.sources.edit', [
			'source' => $source
		]);
	}

	/**
	 * Metodo para actualizar los datos de la fuente.
	 * 
	 * @param  Request $request
	 * @return void
	 */
	public function update($id, Request $request)
	{
		$data = $request->except(['_token']);

		// Datos principales
		$source = Source::find($id);
		$source->update($data);

		return redirect()
			   ->route('admin.sources.edit', ['id' => $id])
			   ->with('status', 'Fuente actualizada!');
	}

	/**
	 * Vista con más info de la fuente y sus enlaces.
	 *
	 * @return Object
	 */
	public function show(Request $request, $id)
	{
		$source = Source::find($id);

		return view('admin.sources.show', [
			'source' => $source,
		]);
	}
}