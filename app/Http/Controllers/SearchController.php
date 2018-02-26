<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function index(Request $request)
	{
        if (! $request->has('q')) {
            $q = null;
        }
        
        $q = $request->input('q');
        
        $posts = Post::search($q)->paginate(20);
        
        return view('search', array(
            'title' => $q,
            'posts' => $posts,
        ));
	}
}