<?php

namespace App\Http\Controllers\Api\v1;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTag;

class TagController extends Controller
{
	/**
	 * Mostrar todos los tags.
	 *
	 * @return Response
	 */
	public function all()
	{
		return Tag::latest('name')->get();
	}

	/**
	 * Agregar un nuevo tag.
	 *
	 * @param  StoreUpdateTag  $request
	 * @return Response
	 */
	public function store(StoreUpdateTag $request)
	{
		$name = $request->input('name');

		$tag = Tag::create([
			'name' => $name,
			'slug' => str_slug($name),
		]);
		
		return response()->json([
			'created' => (boolean) $tag,
		], 201);
	}

	/**
	 * Mostrar los datos de un tag.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id)
	{
		return Tag::where('id', '=', $id)->get();
	}

	/**
	 * Actualizar los datos de un tag.
	 *
	 * @param  StoreUpdateTag  $request
	 * @return Response
	 */
	public function update(StoreUpdateTag $request, $id)
	{
		$name = $request->input('name');

		$tag = Tag::where('id', '=', $id)->update([
			'name' => $name,
			'name' => str_slug($name),
		]);
		
		return response()->json([
			'updated' => (boolean) $tag,
		]);
	}

	/**
	 * Eliminar un tag.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tag = Tag::where('id', '=', $id)->delete();

		return response()->json([
			'deleted' => (boolean) $tag,
		]);
	}
}