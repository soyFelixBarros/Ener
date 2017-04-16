<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
	public function favorite(Post $post)
	{
		Auth::user()->favorites()->toggle($post->id);
		return back();
	}
}