<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/home/index', function () {
   return view('home.index');
});
Route::get('layouts1', function () {
   return view('home.layouts1');
});

Route::get('/a', function () {
   return view('admin.index');
});

// Route::group(['middleware'=>'login'],function(){
// 	Route::resource('index', 'IndexController');
// });

