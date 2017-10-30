<?php
/*Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/home/index', function () {
   return view('Home.index');
});
Route::get('layouts1', function () {
   return view('Home.layouts1');
});

// Route::group(['middleware'=>'login'],function(){
// 	Route::resource('index', 'IndexController');
// });

// 前台新闻路由
Route::resource('/home/news', 'Home\NewsControllers');

// 后台首页
Route::controller('/admin/login', 'Admin\LoginController');
Route::get('/admin/content', 'Admin\IndexController@Content');
Route::get('/admin/user', 'Admin\UserController@User');


//后台新闻路由
Route::resource('/admin/news', 'Admin\NewsControllers');

Route::resource('/admin', 'Admin\IndexController');