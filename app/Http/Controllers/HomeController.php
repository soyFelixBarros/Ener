<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\Province;
use App\Newspaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->session()->has('user')) {
            // $ip = $request->ip();
            $ip = file_get_contents('https://api.ipify.org');
            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

            if (isset($query) && $query['status'] == 'success') {

                session(['user' => [
                    'country_code' => $query['countryCode'],
                    'province_code' => $query['countryCode'].'-'.$query['region'],
                    'state' => $query['regionName'],
                    'country' => $query['country'],
                ]]);
            }
        }

        $newspapers = null;
        $articles = null;

        $user = $request->session()->get('user');

        $newspapers = Newspaper::where('province_code', $user['province_code'])
                               ->oldest('name')
                               ->get();

        $articles = Article::where('province_code', $user['province_code'])
                           ->whereDay('created_at', '>', date('j') - 2)
                           ->latest()
                           ->paginate(20);

        return view('home', array(
            'state' => $user['state'],
            'country' => $user['country'],
            'newspapers' => $newspapers,
            'articles' => $articles,
        ));
    }
}
