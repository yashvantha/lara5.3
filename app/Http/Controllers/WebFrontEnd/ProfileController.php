<?php

namespace App\Http\Controllers\WebFrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    //

    public function index(Request $Request){
    	$user = Auth::user();
    	return view('WebFrontEnd.user_profile', ['user' => $user ]);

    }

     public function logOut(Request $Request){
     	sleep(3);
    	Auth::logout();
    	return redirect()->intended('/');
    }
}
