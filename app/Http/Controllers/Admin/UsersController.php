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
		$users = User::latest()->paginate(30);

		return view('admin.users.index')->with('users', $users);
	}
}