<?php

namespace App\Http\Controllers\Api\v1;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
	public function all()
	{
		return Post::latest()->with('newspaper')->get();
	}

	public function find($id)
	{
		return Post::where('id', '=', $id)->with('newspaper')->get();
	}
}
