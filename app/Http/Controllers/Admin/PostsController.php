<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Newspaper;
use Illuminate\Http\Request;
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
		$posts = Post::latest()->paginate(15);

		return view('admin.posts.list')->with('posts', $posts);
	}

	/**
	 * Vista con el formulario para editar una entrada.
	 *
	 * @return Object
	 */
	public function edit(Request $request, $id)
	{
		$post = Post::find($id);
		$postTags = $post->tags->pluck('name')->toArray();
		$tags = Tag::all();
		$newspapers = Newspaper::all();

		return view('admin.posts.edit', array(
			'post' => $post,
			'postTags' => $postTags,
			'tags' => $tags,
			'newspapers' => $newspapers,
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

		$post = Post::find($id);

		$post->tags()->toggle($request->tags);

		$post->update($data);

		return redirect()
			   ->route('admin_post_edit', ['id' => $id])
			   ->with('status', 'Post updated!');
	}

}