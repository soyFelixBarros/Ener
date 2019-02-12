<?php

namespace App\Http\Controllers\Admin;

use App\Source;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SourcesController extends Controller
{
	/**
	 * Vista con todos las fuentes.
	 *
	 * @return Object
	 */
	public function index(Request $request)
	{
		$sources = Source::oldest('name')->paginate(40);

		return view('admin.sources.index', [
			'sources' => $sources,
		]);
	}
}