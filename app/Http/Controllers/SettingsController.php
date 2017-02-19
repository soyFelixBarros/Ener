<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
	/**
	 * Formulario para editar los datos del usuario.
	 *
	 * @return Response
	 */
	public function profile()
	{
		return view('settings.profile');
	}

	/**
	 * Formulario para cambiar la contraseña.
	 *
	 * @return Response
	 */
	public function security()
	{
		return view('settings.security');
	}
}