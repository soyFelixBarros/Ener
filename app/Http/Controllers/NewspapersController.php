<?php

namespace App\Http\Controllers;

use App\Newspaper;
use Illuminate\Http\Request;

class NewspapersController extends Controller
{
	public function show(Newspaper $newspaper)
	{
		$newspapers = $newspaper->oldest('name')->get();
		
		$posts = $newspaper->posts()
						   ->latest()
						   ->paginate(15);

		return view('newspapers.show', array(
			'title' => $newspaper->name,
			'newspapers' => $newspapers,
			'posts' => $posts,
		));
	}
}