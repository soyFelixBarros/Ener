<?php

namespace App\Http\Controllers\Admin;

use App\Province;
use App\Newspaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewspapersController extends Controller
{
	/**
	 * Vista con todos los diarios
	 *
	 * @return Object
	 */
	public function index()
	{
		$newspapers = Newspaper::oldest('name')->paginate(15);

		return view('admin.newspapers.index')->with('newspapers', $newspapers);
	}

	/**
	 * Vista con el formulario para editar un diario.
	 *
	 * @return Object
	 */
	public function edit($id)
	{
		$newspaper = Newspaper::find($id);
		$provinces = Province::oldest('name')->get();

		return view('admin.newspapers.edit', array(
			'provinces' => $provinces,
			'newspaper' => $newspaper
		));
	}

	/**
	 * Metodo para actualizar los datos de un diario.
	 *
	 * @return void
	 */
	public function update(Request $request, $id)
	{
		$data = $request->except(['_token']);

		$newspaper = Newspaper::find($id);

		$newspaper->update($data);

		return redirect()
			   ->route('admin_newspapers_edit', ['id' => $id])
			   ->with('status', 'Newspaper updated!');
	}
}