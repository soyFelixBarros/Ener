<?php

namespace App\Http\Controllers\Api\v1;

use App\Newspaper;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePost;
use App\Http\Controllers\Controller;

class NewspaperController extends Controller
{

	/**
	 * Mostrar todos los newspaper.
	 *
	 * @return Response
	 */
	public function all()
	{
		return Newspaper::latest()->get();
	}
}
