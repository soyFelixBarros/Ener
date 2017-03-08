<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dateJ = date('j') - 2;

        $tags = Tag::whereDay('updated_at', '>', $dateJ)
                   ->latest('name')
                   ->get();

        $articles = Article::whereDay('created_at', '>', $dateJ)
                     ->latest()
                     ->paginate(15);

        $newspapers = Newspaper::latest('name')->get();
        
        return view('home', array(
            'tags' => $tags,
            'articles' => $articles,
            'newspapers' => $newspapers,
        ));
    }
}
