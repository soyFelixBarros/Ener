<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
	/**
	 * Mostrar todos los posts.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::latest()->with('newspaper')->get();

		return response()->json($posts);
	}
}