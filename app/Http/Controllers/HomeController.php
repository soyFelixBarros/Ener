<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $stories = Story::whereDate('updated_at', date('Y-n-j'))
        //                 ->latest()
        //                 ->first();

        $posts = Post::where('status', 'publish')
                    //  ->whereDate('created_at', date('Y-n-j'))
                    ->latest()
                    ->limit(40)
                    ->get();

        return view('home', array(
            'posts' => $posts,
            'categories' => Category::all()
        ));
    }
}
