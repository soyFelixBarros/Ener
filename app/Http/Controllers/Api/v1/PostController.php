<?php

namespace App\Http\Controllers\Api\v1;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

	/**
	 * Mostrar todos los posts.
	 *
	 * @return Response
	 */
	public function all()
	{
		return Post::latest()->with('newspaper')->get();
	}

	/**
	 * Mostrar un post segun el ID.
	 *
	 * @param  integer  $id
	 * @return Response
	 */
	public function find($id)
	{
		return Post::where('id', '=', $id)->with('newspaper')->get();
	}

	/**
	 * Crear un nuevo post.
	 *
	 * @param  StorePost  $request
	 * @return Response
	 */
	public function store(StorePost $request)
	{
		$post = Post::create($request->all());
		
		return response()->json([
			'created' => (boolean) $post,
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
