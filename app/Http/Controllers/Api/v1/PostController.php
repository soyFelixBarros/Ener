<?php

namespace App\Http\Controllers\Api\v1;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePost;

class PostController extends Controller
{
	/**
	 * Mostrar todos los posts.
	 *
	 * @return Response
	 */
	public function all()
	{
		$posts = Post::latest()->with('newspaper')->get();

		return response()->json($posts);
	}

	/**
	 * Crear un nuevo post.
	 *
	 * @param  StoreUpdatePost  $request
	 * @return Response
	 */
	public function store(StoreUpdatePost $request)
	{
		$post = Post::create($request->all());
		
		return response()->json([
			'created' => (boolean) $post,
		], 201);
	}

	/**
	 * Mostrar los datos de un post.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id)
	{
		$post = Post::where('id', '=', $id)->with('newspaper')->get();

		return response()->json($post);
	}

	/**
	 * Actualizar los datos de un post.
	 *
	 * @param  StoreUpdatePost  $request
	 * @return Response
	 */
	public function update(StoreUpdatePost $request, $id)
	{
		$post = Post::where('id', '=', $id)->update($request->all());
		
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
		$post = Post::where('id', '=', $id)->delete();

		return response()->json([
			'deleted' => (boolean) $post,
		]);
	}
}
