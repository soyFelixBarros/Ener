<?php

namespace App\Http\Controllers\Admin;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
	/**
	 * Vista con todos los enlaces
	 *
	 * @return Object
	 */
	public function index()
	{
		$links = Link::withoutGlobalScopes()->paginate(20);

		return view('admin.links.index')->with('links', $links);
	}

	/**
	 * Vista con el formulario para editar un link.
	 *
	 * @return Object
	 */
	public function edit($id)
	{
		$link = Link::withoutGlobalScopes()->find($id);

		return view('admin.links.edit')->with('link', $link);
	}

	/**
	 * Metodo para actualizar los datos del link.
	 *
	 * @return void
	 */
	public function update($id, Request $request)
	{
		$data = $request->except(['_token']);

		$link = Link::withoutGlobalScopes()->find($id);

		$link->update($data);

		return redirect()
			   ->route('admin_links_edit', ['id' => $id])
			   ->with('status', 'Link updated!');
	}
}