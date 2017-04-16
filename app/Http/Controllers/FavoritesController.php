<?php

namespace App\Http\Controllers;

use App\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
	public function posts()
	{
		$favorites = Auth::user()->favorites()->paginate(20);

		return view('posts.favorites', array(
			'favorites' => $favorites,
		));
	}
}