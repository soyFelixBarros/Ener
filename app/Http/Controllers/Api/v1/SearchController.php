<?php

namespace App\Http\Controllers\Api\v1;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

	/**
	 * Buscar artículos.
	 *
	 * @param  string  $q
	 * @return Response
	 */
	public function articles(Request $request)
	{
		$parameter = $request->all();

		if (isset($parameter['scraping'])) {
			$articles = Post::where('scraping', $parameter['scraping'])->first();
		} else {
			$articles = Post::where('newspaper_id', $parameter['newspaper_id'], 'and')
						 ->where('title', 'LIKE', $parameter['q'] . '%', 'and')
						 ->whereDate('created_at', $parameter['date'])
						 ->get();
		}

		return response()->json($articles);
	}
}
