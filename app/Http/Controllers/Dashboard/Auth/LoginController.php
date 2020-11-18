<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function getLogin() {
    	return view('dashboard.auth.login');
    }

    public function postLogin(Request $request) {
    	$email = $request->email;
    	$password = $request->password;
    	if(Auth::attempt(['email' => $email, 'password' => $password, 'status' => 0])) {
    		return redirect()->intended('');
    	}

    	return redirect()->back()->with('errors', 'Email hoặc mật khẩu không đúng.');;
    	toastr()->error('Email hoặc mật khẩu không đúng.');
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->to('/login');
    }
}
