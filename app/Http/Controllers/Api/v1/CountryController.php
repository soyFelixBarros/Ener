<?php

namespace App\Http\Controllers\Api\v1;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCountry;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
	/**
	 * Mostrar todos los países.
	 *
	 * @return Response
	 */
	public function all()
	{
		return Country::latest('name')->get();
	}

	/**
	 * Agregar un nuevo país.
	 *
	 * @param  StoreUpdateCountry  $request
	 * @return Response
	 */
	public function store(StoreUpdateCountry $request)
	{
		$country = Country::create($request->all());
		
		return response()->json([
			'created' => (boolean) $country,
		], 201);
	}

	/**
	 * Mostrar los datos de un país.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id)
	{
		return Country::where('id', '=', $id)->get();
	}

	/**
	 * Actualizar los datos de un país.
	 *
	 * @param  StoreUpdateCountry  $request
	 * @return Response
	 */
	public function update(StoreUpdateCountry $request, $id)
	{
		$country = Country::where('id', '=', $id)->update($request->all());
		
		return response()->json([
			'updated' => (boolean) $country,
		]);
	}

	/**
	 * Eliminar un país.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$country = Country::where('id', '=', $id)->delete();

		return response()->json([
			'deleted' => (boolean) $country,
		]);
	}
}