<?php

namespace App\Http\Controllers\Api\v1;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLink;

class LinkController extends Controller
{
	/**
	 * Mostrar todos los links.
	 *
	 * @return Response
	 */
	public function all()
	{
		$links = Link::latest()
					 ->with('newspaper')
					 ->get();
		
		return response()->json($links);
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
	public function find(Request $request, $id = null)
	{
		if ($id !== null) {
			$link = Link::where('id', $id)
						->with('newspaper')
						->get();
		} else {
			$data = $request->all();
			if (isset($data['scraping'])) {
				$link = Link::where('scraping', $data['scraping'])
							->with('scraping')
							->first();
			} else {
				$link = Link::where('scraping', null)
							->oldest('updated_at')
							->with('newspaper')
							->with('scraping')
							->first();
			}
		}

		return response()->json($link);
	}

	/**
	 * Actualizar los datos de un link.
	 *
	 * @param  StoreUpdateNewspaper  $request
	 * @return Response
	 */
	public function update(StoreUpdateLink $request, $id)
	{
		$link = Link::where('id', $id)
					->update($request->all());
		
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
		$link = Link::where('id', $id)
					->delete();

		return response()->json([
			'deleted' => (boolean) $link,
		]);
	}
}
