<?php

namespace App\Http\Controllers\Api\v1;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateLink;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
	/**
	 * Mostrar todos los links.
	 *
	 * @return Response
	 */
	public function all()
	{
		return Link::latest()->get();
	}

	/**
	 * Crear un nuevo link.
	 *
	 * @param  StoreUpdateLink  $request
	 * @return Response
	 */
	public function store(StoreUpdateLink $request)
	{
		$link = Link::create($request->all());
		
		return response()->json([
			'created' => (boolean) $link,
		], 201);
	}

	/**
	 * Mostrar los datos de un link.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id)
	{
		return Link::where('id', '=', $id)->get();
	}

	/**
	 * Actualizar los datos de un link.
	 *
	 * @param  StoreUpdateNewspaper  $request
	 * @return Response
	 */
	public function update(StoreUpdateLink $request, $id)
	{
		$link = Link::where('id', '=', $id)->update($request->all());
		
		return response()->json([
			'updated' => (boolean) $link,
		]);
	}

	/**
	 * Eliminar un link.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$link = Link::where('id', '=', $id)->delete();

		return response()->json([
			'deleted' => (boolean) $link,
		]);
	}
}