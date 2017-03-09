<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\Province;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($province = null)
    {
        $dateJ = date('j') - 2;

        $tags = Tag::whereDay('updated_at', '>', $dateJ)
                   ->latest('name')
                   ->get();

        $articles = Article::whereDay('created_at', '>', $dateJ)
                     ->latest()
                     ->paginate(15);

        $newspapers = Newspaper::oldest('name')->get();
        
        return view('home', array(
            'tags' => $tags,
            'articles' => $articles,
            'newspapers' => $newspapers,
        ));
    }
}
