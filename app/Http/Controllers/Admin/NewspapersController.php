<?php

namespace App\Http\Controllers\Admin;

use App\Province;
use App\Newspaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateNewspaper;

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
	 * Vista con el formulario para agregar un diario.
	 *
	 * @return Object
	 */
	public function create()
	{
		$provinces = Province::oldest('name')->get();

		return view('admin.newspapers.create')->with('provinces', $provinces);
	}

	/**
	 * Crear un diario.
	 *
	 * @return Object
	 */
	public function store(StoreUpdateNewspaper $request)
	{
		$data = $request->except(['_token']);

		$data['slug'] = str_slug($data['name']);

		$newspaper = Newspaper::create($data); 

		return redirect()
			   ->route('admin_newspapers_edit', ['id' => $newspaper->id])
			   ->with('status', 'Newspaper created!');
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

		$data['slug'] = str_slug($data['name']);

		$newspaper->update($data);

		return redirect()
			   ->route('admin_newspapers_edit', ['id' => $id])
			   ->with('status', 'Newspaper updated!');
	}
}