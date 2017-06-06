<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Parent;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $newspapers = Newspaper::oldest('name')->get();

        $posts = Post::where('status', 'publish', 'and')
                     ->whereDay('created_at', date('j'))
                     ->latest()
                     ->get();
        $parents = Parent::latest()->get();

        return view('home', array(
            'newspapers' => $newspapers,
            'parents' => $parents,
            'posts' => $posts,
        ));
    }
}
