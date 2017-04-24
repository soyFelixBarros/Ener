<?php

namespace App\Http\Controllers;

use App\Mail\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $mail = Mail::to($request->user())->send(new Report);
        dd($mail);
    }
}