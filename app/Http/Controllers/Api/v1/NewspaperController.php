<?php

namespace App\Http\Controllers\Api\v1;

use App\Newspaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateNewspaper;

class NewspaperController extends Controller
{
	/**
	 * Mostrar todos los diarios.
	 *
	 * @return Response
	 */
	public function all()
	{
		$newspapers = Newspaper::latest('name')
							   ->with('province')
							   ->with('links')
							   ->get();

		return response()->json($newspapers);
	}

	/**
	 * Agregar un nuevo diario.
	 *
	 * @param  StoreUpdateNewspaper  $request
	 * @return Response
	 */
	public function store(StoreUpdateNewspaper $request)
	{
		$newspaper = Newspaper::create($request->all());
		
		return response()->json([
			'created' => (boolean) $newspaper,
		], 201);
	}

	/**
	 * Ver un diario.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id = null)
	{
		$newspaper = Newspaper::where('id', $id)
							  ->with('province')
							  ->with('links')
							  ->get();

		return response()->json($newspaper);
	}

	/**
	 * Actualizar un diario.
	 *
	 * @param  StoreUpdateNewspaper  $request
	 * @return Response
	 */
	public function update(StoreUpdateNewspaper $request, $id)
	{
		$newspaper = Newspaper::where('id', '=', $id)
							  ->update($request->all());
		
		return response()->json([
			'updated' => (boolean) $newspaper,
		]);
	}

	/**
	 * Eliminar un newspaper.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$newspaper = Newspaper::where('id', '=', $id)
							  ->delete();

		return response()->json([
			'deleted' => (boolean) $newspaper,
		]);
	}
}
