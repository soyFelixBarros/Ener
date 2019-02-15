<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	/**
	 * Vista principal del panel.
	 *
	 * @return Object
	 */
	public function index(Request $request)
	{
		return view('admin.dashboard.index');
	}
}