<?php

namespace App\Http\Controllers;

use App\Post;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()
                     ->with('newspaper')
                     ->get();

        $newspapers = Newspaper::latest('name')
                               ->with('posts')
                               ->get();

        return view('home', array(
            'posts' => $posts,
            'newspapers' => $newspapers,
        ));
    }
}
