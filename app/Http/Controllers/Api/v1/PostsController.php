<?php

namespace App\Http\Controllers\Api\v1;

use App\Link;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePost;

class PostsController extends Controller
{
	/**
	 * Mostrar todas las entradas.
	 *
	 * @return Response
	 */
	public function all()
	{
		$posts = Post::latest()
					 ->with('newspaper')
					 ->get();

		return response()->json($posts);
	}

	/**
	 * Crear una nueva entrada.
	 *
	 * @param  StoreUpdatePost  $request
	 * @return Response
	 */
	public function store(StoreUpdatePost $request)
	{
		$data = $request->all();

		$post = Post::create($data);

		$link = new Link([
			'article_id' => $post->id,
			'newspaper_id' => $post['newspaper_id'],
			'scraping_id' => $post['scraping_id'],
			'url' => $post['url'],
			'scraping' => $post['scraping'],
		]);

		$post->link()->save($link);
		
		return response()->json([
			'created' => (boolean) $post,
			'data' => $post,
		], 201);
	}

	/**
	 * Ver una entrada.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id = null)
	{
		$post = Post::where('id', '=', $id)
					->with('newspaper')
					->get();

		return response()->json($post);
	}

	/**
	 * Actualizar una entrada.
	 *
	 * @param  StoreUpdatePost  $request
	 * @return Response
	 */
	public function update(StoreUpdatePost $request, $id)
	{
		$post = Post::where('id', '=', $id)
					   ->update($request->all());
		
		return response()->json([
			'updated' => (boolean) $post,
		]);
	}

	/**
	 * Eliminar un post.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::where('id', '=', $id)
					->delete();

		return response()->json([
			'deleted' => (boolean) $post,
		]);
	}
}
