<?php

namespace App\Http\Controllers;

use App\Article;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::whereDay('created_at', '>', (date('j') - 2))
                     ->latest()
                     ->paginate(15);

        $newspapers = Newspaper::latest('name')->get();
        
        return view('home', array(
            'articles' => $articles,
            'newspapers' => $newspapers,
        ));
    }
}
