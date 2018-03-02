<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	/**
	 * Vista con todos los usuarios.
	 *
	 * @return Object
	 */
	public function index()
	{
		$title = 'Usuarios';
		$users = User::latest()->paginate(30);

		return view('admin.users.index', [
			'title' => $title,
			'users' => $users
		]);
	}
}