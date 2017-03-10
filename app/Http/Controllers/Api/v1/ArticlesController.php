<?php

namespace App\Http\Controllers\Api\v1;

use App\Link;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateArticle;

class ArticlesController extends Controller
{
	/**
	 * Mostrar todas las noticias.
	 *
	 * @return Response
	 */
	public function all()
	{
		$articles = Article::latest()
					 ->with('newspaper')
					 ->get();

		return response()->json($articles);
	}

	/**
	 * Crear un nuevo articulo.
	 *
	 * @param  StoreUpdatePost  $request
	 * @return Response
	 */
	public function store(StoreUpdateArticle $request)
	{
		$data = $request->all();

		$article = Article::create($data);

		$link = new Link([
			'article_id' => $article->id,
			'newspaper_id' => $data['newspaper_id'],
			'scraping_id' => $data['scraping_id'],
			'url' => $data['url'],
			'scraping' => $data['scraping'],
		]);

		$article->link()->save($link);
		
		return response()->json([
			'created' => (boolean) $article,
			'data' => $article,
		], 201);
	}

	/**
	 * Mostrar los datos de un articulo.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id = null)
	{
		$article = Article::where('id', '=', $id)
					->with('newspaper')
					->get();

		return response()->json($article);
	}

	/**
	 * Actualizar los datos de un articulo.
	 *
	 * @param  StoreUpdateArticle  $request
	 * @return Response
	 */
	public function update(StoreUpdateArticle $request, $id)
	{
		$article = Article::where('id', '=', $id)
					->update($request->all());
		
		return response()->json([
			'updated' => (boolean) $article,
		]);
	}

	/**
	 * Eliminar un articulo.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::where('id', '=', $id)
					->delete();

		return response()->json([
			'deleted' => (boolean) $article,
		]);
	}
}
