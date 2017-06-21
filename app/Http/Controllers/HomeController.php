<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, $country = null, $province = null)
    {
        $newspapers = Newspaper::oldest('name')->get();

        $posts = Post::where('status', 'publish')
                     ->whereDate('created_at', date('Y-n-j'))
                     ->latest()
                     ->get();
        
        return view('home', array(
            'newspapers' => $newspapers,
            'posts' => $posts,
        ));
    }
}
