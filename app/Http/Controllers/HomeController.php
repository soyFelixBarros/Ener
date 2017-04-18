<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $newspapers = Newspaper::oldest('name')->get();

        $posts = Post::where('status', 'publish', 'and')
                     ->whereDay('created_at', '>', date('j') - 2)
                     ->latest()
                     ->paginate(20);

        return view('home', array(
            'newspapers' => $newspapers,
            'posts' => $posts,
        ));
    }
}
