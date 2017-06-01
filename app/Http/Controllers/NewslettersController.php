<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewslettersController extends Controller
{
    public function index()
    {
        return view('newsletters.index');
    }

    public function show($newsletter)
    {
        return view('emails.newsletters.morning-report');
    }
}