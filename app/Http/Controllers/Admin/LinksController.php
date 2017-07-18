<?php

namespace App\Http\Controllers\Admin;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
	/**
	 * Vista con todos los enlaces
	 *
	 * @return Object
	 */
	public function index()
	{
		$links = Link::withoutGlobalScopes()->paginate(15);

		return view('admin.links.index')->with('links', $links);
	}
}