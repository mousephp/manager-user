<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{
    public function ForgotPassword(){
		return view('auth.forgot-password');
    }
    
    public function getEmail()
    {
		return view('auth.forgot-password');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('email.verify',['token' => $token], function($message) use ($request) {
          	$message->from('nguyenvanhungcd0007@gmail.com');
          	$message->to($request->email);
          	$message->subject('Reset Password Notification');
       	});

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
