<?php

namespace App\Http\Controllers\Api\v1;

use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProvince;

class ProvinceController extends Controller
{
	/**
	 * Mostrar todos las provincia.
	 *
	 * @return Response
	 */
	public function all()
	{
		return Province::latest('name')->get();
	}

	/**
	 * Agregar una nueva provincia.
	 *
	 * @param  StoreUpdateProvince  $request
	 * @return Response
	 */
	public function store(StoreUpdateProvince $request)
	{
		$province = Province::create($request->all());
		
		return response()->json([
			'created' => (boolean) $province,
		], 201);
	}

	/**
	 * Mostrar los datos de una provincia.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id)
	{
		return Province::where('id', '=', $id)->get();
	}

	/**
	 * Actualizar los datos de una provincia.
	 *
	 * @param  StoreUpdateProvince  $request
	 * @return Response
	 */
	public function update(StoreUpdateProvince $request, $id)
	{
		$province = Province::where('id', '=', $id)->update($request->all());
		
		return response()->json([
			'updated' => (boolean) $province,
		]);
	}

	/**
	 * Eliminar una provincia.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$province = Province::where('id', '=', $id)->delete();

		return response()->json([
			'deleted' => (boolean) $province,
		]);
	}
}