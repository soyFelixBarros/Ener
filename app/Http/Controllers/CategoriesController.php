<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
	public function show(Request $request)
	{
		$category = $request->category;

		$posts = $category->posts()
						  ->latest()
						  ->paginate(20);

		return view('categories.show', array(
			'title' => $category->name,
			'posts' => $posts,
		));
	}
}