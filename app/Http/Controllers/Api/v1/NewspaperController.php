<?php

namespace App\Http\Controllers\Api\v1;

use App\Newspaper;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateNewspaper;
use App\Http\Controllers\Controller;

class NewspaperController extends Controller
{
	/**
	 * Mostrar todos los newspaper.
	 *
	 * @return Response
	 */
	public function all()
	{
		return Newspaper::latest('name')->get();
	}

	/**
	 * Crear un nuevo newspaper.
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
	 * Mostrar los datos de un newspaper.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id)
	{
		return Newspaper::where('id', '=', $id)->get();
	}
}
