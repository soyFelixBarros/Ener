<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
	public function index()
	{
		$day = date('j');
        $posts = Post::where('status', 'publish', 'and')
                     ->whereDay('created_at', '=', $day)
                     ->latest()
                     ->get();

		return view('emails.report', array(
			'dayAndMonth' => $dayAndMonth = $day.'/'.date('m').'/'.date('Y'),
			'posts' => $posts,
		));
	}
}