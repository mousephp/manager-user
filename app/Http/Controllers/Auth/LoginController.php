<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{    
    public function getLogin(){
		return view('auth.login');
	}

	public function postLogin(Request $request){
		$this->validate($request,
	        [
	            'email'     => 'required',
	            'password' => 'required',
	            'g-recaptcha-response' => 'required|captcha',
	        ]
    	);
    	
		$arr = ['email' => $request->email,'password'=>$request->password];
		if($request->remember == 'Remember Me'){
			$remember = true;
		}else{
			$remember = false;
		}

		if(Auth::attempt($arr,$remember)){
			return redirect()->route('home');
		}else{
			return back()->withInput()->with('error','Tài khoản hoặc mật khẩu không đúng');
		}
	}

}
