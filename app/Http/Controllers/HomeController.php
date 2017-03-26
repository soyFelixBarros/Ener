<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Province;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $province_code = 'AR-H';

        $newspapers = Newspaper::where('province_code', $province_code)
                               ->oldest('name')
                               ->get();

        $posts = Post::where('province_code', $province_code)
                           ->whereDay('created_at', '>', date('j') - 2)
                           ->latest()
                           ->paginate(20);

        return view('home', array(
            'newspapers' => $newspapers,
            'posts' => $posts,
        ));
    }
}
