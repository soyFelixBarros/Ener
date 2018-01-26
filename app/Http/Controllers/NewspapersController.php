<?php

namespace App\Http\Controllers;

use App\Newspaper;
use Illuminate\Http\Request;

class NewspapersController extends Controller
{
	public function index()
	{
		$newspapers = Newspaper::all();

		return view('newspapers.index')->with('newspapers', $newspapers);	
	}

	public function show(Request $request)
	{
		$newspaper = $request->newspaper;
		$posts = $newspaper->posts()
						   ->latest()
						   ->paginate(40);

		return view('newspapers.show', array(
			'title' => $newspaper->name,
			'posts' => $posts,
		));
	}
}