<?php

namespace App\Http\Controllers\Admin;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
	/**
	 * Método para mostrar el y ejecutar el evento que trae el contenido.
	 *
	 * @return Object
	 */
	public function show(Request $request, $id)
	{
        $link = Link::find($id);

		return view('admin.links.show', [
			'link' => $link,
		]);
    }
}