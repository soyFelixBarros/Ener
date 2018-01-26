<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
	/**
	 * Vista con todos los suscriptores.
	 *
	 * @return Object
	 */
	public function index()
	{
		$subscribers = Subscriber::latest()->paginate(30);

		return view('admin.subscribers.index')->with('subscribers', $subscribers);
	}

	/**
	 * Vista con el formulario para editar un suscriptor.
	 *
	 * @return Object
	 */
	public function edit($id)
	{
		$subscriber = Subscriber::find($id);

		return view('admin.subscribers.edit')->with('subscriber', $subscriber);
	}

	/**
	 * Actualizar los datos de un suscriptor.
	 *
	 * @return void
	 */
	public function update(Request $request, $id)
	{
		$data = $request->except(['_token']);

		$subscriber = Subscriber::find($id); 

		$subscriber->update($data);

		return redirect()
			   ->route('admin_subscribers_edit', ['id' => $id])
			   ->with('status', 'Subscriber updated!');
	}

	/**
	 * Vista con el formulario para crear un suscriptor.
	 *
	 * @return Object
	 */
	public function create()
	{
		return view('admin.subscribers.create');
	}

	/**
	 * Crear un suscriptor.
	 *
	 * @return Object
	 */
	public function store(Request $request)
	{
		$data = $request->except(['_token']);

		$subscriber = Subscriber::create($data); 

		return redirect()
			   ->route('admin_subscribers_edit', ['id' => $subscriber->id])
			   ->with('status', 'Subscriber created!');
	}
}