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
		$params = $request->all();

		$posts = Post::where('newspaper_id', $params['newspaper_id'], 'and')
					 ->where('title', 'LIKE', '%' . $params['q'] . '%', 'and')
					 ->whereDate('created_at', $params['date'])
					 ->get();

		return response()->json($posts);
	}
}
