<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Newspaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
	/**
	 * Vista con todos los posts.
	 *
	 * @return Object
	 */
	public function index(Post $post)
	{
		$posts = with($post)
		       ->orderBy('created_at', 'DESC')
		       ->paginate(15);

		return view('posts.index', array(
			'posts' => $posts,
		));
	}

	public function edit(Request $request, $id)
	{
		$post = Post::find($id);
		$postTags = $post->tags->pluck('name')->toArray();
		$tags = Tag::all();
		$newspapers = Newspaper::all();

		// $tags = $post->tags->pluck('name')->toArray();
		// $tags =  implode(', ', $tags); 

		return view('posts.edit', array(
			'post' => $post,
			'postTags' => $postTags,
			'tags' => $tags,
			'newspapers' => $newspapers,
		));
	}

	public function update(Request $request, $id)
	{
		$data = $request->except(['_token']);

		$post = Post::find($id);

		$post->tags()->toggle($request->tags);

		$post->update($data);

		return redirect()->route('post_edit', ['id' => $id])->with('status', 'Post updated!');
	}

}