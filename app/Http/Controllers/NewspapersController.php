<?php

namespace App\Http\Controllers;

use App\Newspaper;
use Illuminate\Http\Request;

class NewspapersController extends Controller
{
	public function show(Newspaper $newspaper)
	{
		$articles = $newspaper->articles;

		return $articles;
	}
}