<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['namespace' => 'CustomAuth'], function () {
		Route::post('/login', 'LoginController@authenticate');
		Route::post('/register', 'RegisterController@register');
});

Route::group(['namespace' => 'WebFrontEnd','middleware' => 'auth'], function () {
		Route::get('/profile', 'ProfileController@index');
		Route::get('/profile/logout', 'ProfileController@logOut');
});
 // Auth::routes();

// Route::get('/home', 'HomeController@index');

