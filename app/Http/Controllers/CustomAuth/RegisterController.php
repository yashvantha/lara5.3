<?php

namespace App\Http\Controllers\CustomAuth;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function register(Request $request){

     $this->validate($request, [
		    'user_first_name' => 'required|max:15',
		    'user_last_name' => 'required|max:15',
		    'user_email'   =>'required|email|unique:users,email',
		    'user_phone'  =>'required|digits:10|unique:users,phone',
		    'user_password'=>'required'
    ]);

     try{

     	$user = new User;
        $user->first_name = $request->user_first_name;
        $user->last_name = $request->user_last_name;
        $user->email = $request->user_email;
        $user->phone = $request->user_phone;
        $user->password =Hash::make($request->user_password);

        $user->save();

     }catch(Exception $e){


     }

    }
}
