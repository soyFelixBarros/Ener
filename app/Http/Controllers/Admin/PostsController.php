<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Province;
use App\Category;
use App\Newspaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
	/**
	 * Vista con todos las entradas.
	 *
	 * @return Object
	 */
	public function index(Post $post)
	{
		$posts = Post::withoutGlobalScopes()->latest()->paginate(15);

		return view('admin.posts.list')->with('posts', $posts);
	}

	/**
	 * Vista con el formulario para editar una entrada.
	 *
	 * @return Object
	 */
	public function edit(Request $request, $id)
	{
		$post = Post::withoutGlobalScopes()->find($id);
		$categories = Category::all();
		$provinces = Province::all();

		return view('admin.posts.edit', array(
			'post' => $post,
			'provinces' => $provinces,
			'categories' => $categories,
		));
	}

	/**
	 * Metodo para actualizar los datos de una entrada.
	 *
	 * @return void
	 */
	public function update(Request $request, $id)
	{
		$data = $request->except(['_token']);

		$post = Post::withoutGlobalScopes()->find($id);

		$post->update($data);

		return redirect()
			   ->back()
			   ->with('status', 'Post updated!');
	}

	/**
	 * Vista con el formulario para eliminar un post.
	 *
	 * @return object
	 */
	public function delete($post)
	{
		$post = Post::withoutGlobalScopes()->find($post);

		return view('admin.posts.delete')->with('post', $post);
	}

	/**
	 * Metodo para eliminar una entrada.
	 *
	 * @return object
	 */
	public function destroy(Post $post)
	{
		$post->delete();

		return redirect()
			   ->route('admin_posts')
			   ->with('status', 'Post deleted!');
	}

	/**
	 * Método para agregar un post a favoritos.
	 *
	 * @return object
	 */
	public function favorite(Post $post)
	{
		Auth::user()->favorites()->toggle($post->id);
		return back();
	}
}