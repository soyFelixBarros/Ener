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
		$links = Link::withoutGlobalScopes()->paginate(40);

		return view('admin.links.index')->with('links', $links);
	}

	/**
	 * Vista con el formulario para agregar un link.
	 *
	 * @return Object
	 */
	public function create()
	{
		return view('admin.links.create');
	}

	/**
	 * Metodo para agregar un link.
	 *
	 * @return Object
	 */
	public function store(Request $request)
	{
		$data = $request->except(['_token']);

		$link = Link::create($data); 

		return redirect()
			   ->route('admin_links_edit', ['id' => $link->id])
			   ->with('status', 'Link created!');
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


	/**
	 * Vista con el formulario para eliminar un link.
	 *
	 * @return object
	 */
	public function delete($link)
	{
		$link = Link::withoutGlobalScopes()->find($link);

		return view('admin.links.delete')->with('link', $link);
	}

	/**
	 * Metodo para eliminar un link.
	 *
	 * @return object
	 */
	public function destroy($link)
	{
		$post = Link::withoutGlobalScopes()
					->find($link)
					->delete();

		return redirect()
			   ->route('admin_links')
			   ->with('status', 'Link deleted!');
	}
}