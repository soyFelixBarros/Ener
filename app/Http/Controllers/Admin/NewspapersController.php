<?php

namespace App\Http\Controllers\Admin;

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
}