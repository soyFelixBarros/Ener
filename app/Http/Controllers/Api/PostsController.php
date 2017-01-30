<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
	public function all()
	{
		return Post::with('newspaper')->latest()->get();
	}

	public function find($id)
	{
		return Post::with('newspaper')->find($id)->get();
	}
}
