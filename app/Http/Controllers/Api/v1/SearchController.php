<?php

namespace App\Http\Controllers\Api\v1;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

	/**
	 * Buscar posts.
	 *
	 * @param  string  $q
	 * @return Response
	 */
	public function posts(Request $request)
	{
		$parameter = $request->all();

		if (isset($parameter['scraping'])) {
			$posts = Post::where('scraping', $parameter['scraping'])->first();
		} else {
			$posts = Post::where('newspaper_id', $parameter['newspaper_id'], 'and')
						 ->where('title', 'LIKE', $parameter['q'] . '%', 'and')
						 ->whereDate('created_at', $parameter['date'])
						 ->get();
		}

		return response()->json($posts);
	}
}
