<?php

namespace App\Http\Controllers\CustomAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    //

     public function authenticate(Request $request)
    {

    	$this->validate($request, [
		    'user_name' => 'required',
		    'user_password'=>'required'
        ]);
    	Auth::logout();
        if (Auth::attempt(['email' => $request->input('user_name'), 'password' => $request->input('user_password')])) {
            return redirect()->intended('profile');
        }
    }
}
