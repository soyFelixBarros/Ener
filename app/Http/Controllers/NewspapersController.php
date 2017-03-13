<?php

namespace App\Http\Controllers;

use App\Newspaper;
use Illuminate\Http\Request;

class NewspapersController extends Controller
{
	public function show(Newspaper $newspaper)
	{
		$newspapers = $newspaper->oldest('name')->get();
		
		$articles = $newspaper->articles()
							  ->latest()
							  ->paginate(15);

		return view('newspapers.show', array(
			'newspapers' => $newspapers,
			'articles' => $articles,
		));
	}
}