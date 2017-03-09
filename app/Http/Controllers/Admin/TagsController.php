<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
	/**
	 * Vista con todos los artículos.
	 *
	 * @return Object
	 */
	public function index()
	{
		$tags = Tag::latest()->paginate(15);

		return view('admin.tags.index')->with('tags', $tags);
	}

	/**
	 * Vista con el formulario para crear un tag.
	 *
	 * @return void
	 */
	public function create()
	{
		return view('admin.tags.create');
	}

	/**
	 * Crear un nuevo tag.
	 *
	 * @return void
	 */
	public function store(Request $request)
	{
		$data = $request->except(['_token']);

		$data['slug'] = str_slug($data['name']);

		$tag = Tag::create($data); 

		return redirect()
			   ->route('admin_tag_edit', ['id' => $tag->id])
			   ->with('status', 'Tag created!');
	}

	/**
	 * Vista con el formulario para editar un tag.
	 *
	 * @return Object
	 */
	public function edit($id)
	{
		$tag = Tag::find($id);

		return view('admin.tags.edit')->with('tag', $tag);
	}

	/**
	 * Actualizar los datos de un tag.
	 *
	 * @return void
	 */
	public function update(Request $request, $id)
	{
		$data = $request->except(['_token']);

		$data['slug'] = str_slug($data['name']);

		$tag = Tag::find($id); 

		$tag->update($data);

		return redirect()
			   ->route('admin_tag_edit', ['id' => $id])
			   ->with('status', 'Tag updated!');
	}
}