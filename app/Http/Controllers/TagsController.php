<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
	public function index(Tag $tag)
	{
		return $tag->all();
	}

	public function show(Tag $tag)
	{
		$posts = $tag->articles;

		return $posts;
	}
}