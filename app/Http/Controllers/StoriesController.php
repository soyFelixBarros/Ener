<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoriesController extends Controller
{
	public function show($id)
	{
		$stories = Story::find($id)->posts()->get();
		
		return view('stories.show', array(
			'stories' => $stories,
		));
	}
}