<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
	public function show(Category $category)
	{		
		$posts = $category->posts()
						  ->latest()
						  ->paginate(15);

		return view('categories.show', array(
			'title' => $category->name,
			'posts' => $posts,
		));
	}
}