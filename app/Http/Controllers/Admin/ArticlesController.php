<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Article;
use App\Newspaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
	/**
	 * Vista con todos los artículos.
	 *
	 * @return Object
	 */
	public function index(Article $article)
	{
		$articles = Article::latest()->paginate(15);

		return view('admin.articles.list')->with('articles', $articles);
	}

	/**
	 * Vista con el formulario para editar un artículo.
	 *
	 * @return Object
	 */
	public function edit(Request $request, $id)
	{
		$article = Article::find($id);
		$articleTags = $article->tags->pluck('name')->toArray();
		$tags = Tag::all();
		$newspapers = Newspaper::all();

		return view('admin.articles.edit', array(
			'article' => $article,
			'articleTags' => $articleTags,
			'tags' => $tags,
			'newspapers' => $newspapers,
		));
	}

	/**
	 * Metodo para actualizar los datos de un artículo.
	 *
	 * @return void
	 */
	public function update(Request $request, $id)
	{
		$data = $request->except(['_token']);

		$article = Article::find($id);

		$article->tags()->toggle($request->tags);

		$article->update($data);

		return redirect()
			   ->route('admin_article_edit', ['id' => $id])
			   ->with('status', 'Article updated!');
	}

}