<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function home(){
    	return view('admin.dashboard.dashboard');
    }

    public function logout(){
		Auth::logout();
		return redirect()->route('login');
	}
	
}
