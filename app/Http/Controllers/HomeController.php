<?php

namespace App\Http\Controllers;

use App\Post;
// use App\Story;
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
                    ->get();

        return view('home', array(
            // 'stories' => $stories,
            'posts' => $posts,
        ));
    }
}
