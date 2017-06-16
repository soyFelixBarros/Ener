<?php

namespace App\Http\Controllers\Api\v1;

use App\Newspaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateNewspaper;

class NewspapersController extends Controller
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
		$data = $request->all();
		$data['slug'] = str_slug($data['name']);
		$newspaper = Newspaper::create($data);
		
		return response()->json([
			'created' => (boolean) $newspaper,
			'data' => $newspaper,
		], 201);
	}

	/**
	 * Actualizar un diario.
	 *
	 * @param  StoreUpdateNewspaper  $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$newspaper = Newspaper::findOrFail($id);
		$newspaper->province_code = $request->input('province_code');
		$newspaper->name = $request->input('name');
		$newspaper->website = $request->input('website');
		$newspaper->slug = str_slug($request->input('name'));
		$newspaper->save();
		
		return response()->json([
			'updated' => (boolean) $newspaper,
			'data' => $newspaper,
		], 200);
	}

	/**
	 * Eliminar un newspaper.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$newspaper = Newspaper::where('id', $id)
							  ->delete();

		return response()->json([
			'deleted' => (boolean) $newspaper,
		]);
	}
}
