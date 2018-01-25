<?php

namespace App\Http\Controllers\Api\v1;

use App\Link;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePost;
use App\Http\Resources\PostCollection;

class PostController extends Controller
{
	/**
	 * Mostrar todas las publicaciones.
	 *
	 * @return Response
	 */
	public function index()
	{
		return new PostCollection(Post::all());
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
