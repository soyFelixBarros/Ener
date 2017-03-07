<?php

namespace App\Http\Controllers;

use App\Article;
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
        $articles = Article::whereDay('created_at', '>', (date('j') - 3))
                     ->latest()
                     ->with('newspaper')
                     ->get();

        $newspapers = Newspaper::latest('name')->get();
        
        return view('home', array(
            'articles' => $articles,
            'newspapers' => $newspapers,
        ));
    }
}
