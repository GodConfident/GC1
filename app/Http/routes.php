<?php
/*Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//打印sql语句
  // DB::listen(function($sql, $bindings, $time) { dump($sql); });
//前台主页路由
Route::controller('/home/index', 'Home\IndexController');
//首页新闻板块路由
Route::get('home/news/{name?}', 'Home\NewsTypeController@news');

Route::get('layouts1', function () {
   return view('Home.layouts1');
});

// Route::group(['middleware'=>'login'],function(){
// 	Route::resource('index', 'IndexController');
// });

// 前台新闻路由
// Route::resource('/home/news', 'Home\NewsControllers');

// 后台首页
Route::controller('/admin/login', 'Admin\LoginController');

Route::get('/admin/content', 'Admin\IndexController@Content');
Route::get('/admin/user', 'Admin\UserController@User');


Route::post('/admin/user/adduser','Admin\UserController@checkUsername');

Route::get('/user/recover/{id}','Admin\UserController@recover');

Route::get('/admin/user/activation', 'Admin\UserController@activation');
Route::resource('/admin/activation','User\ActivationController');

//后台添加子版块路由
// Route::resource('/admin/newstype/', 'Admin\NewsTypeController');
Route::post('/admin/newstype/addtype/', 'Admin\NewsTypeController@addtype');
//后台板块显示、隐藏路由
Route::get('/admin/newstype/bshow/{id}', 'Admin\NewsTypeController@bshow');
//后台 新闻版块 路由
Route::resource('/admin/newstype', 'Admin\NewsTypeController');


//后台验证码
Route::get('/code','Code@index');


//后台新闻编辑中 图片上传方法 路由
// Route::post('/admin/news/uploadimg', 'Admin\NewsControllers@uploadimg');
//后台新闻显示、隐藏的路由
Route::get('/admin/news/nshow/{id}', 'Admin\NewsControllers@nshow');
//后台新闻列表路由
Route::resource('/admin/news', 'Admin\NewsControllers');
//后台单页列表路由
Route::resource('/admin/single', 'Admin\SingleController');
//后台社区板块设置
Route::resource('/admin/bbs/type', 'Admin\bbstypeController');


//  控制器内加方法 控制器加方法 控制器加其他方法 控制器内加其他方法
//网站添加配置路由
Route::get('/admin/conf/websetadd', 'Admin\ConfController@websetadd');
//修改网站配置路由
Route::post('/admin/conf/webchange', 'Admin\ConfController@webchange');
//网站配置路由
Route::resource('/admin/conf', 'Admin\ConfController');




//  控制器内加方法 控制器加方法 控制器加其他方法 控制器内加其他方法
//网站添加配置路由
Route::get('/admin/conf/websetadd', 'Admin\ConfController@websetadd');
//修改网站配置路由
Route::post('/admin/conf/webchange', 'Admin\ConfController@webchange');
//网站配置写进文件路由
// Route::post('/admin/conf', 'Admin\ConfController');
//网站配置路由
Route::resource('/admin/conf', 'Admin\ConfController');



Route::get('/admin/index', 'Admin\IndexController@Content');
// Route::get('/admin/index/set', 'Admin\IndexController@set');
Route::get('/admin/index/sensitive', 'Admin\IndexController@sensitive');
Route::get('/admin/user/del', 'Admin\UserController@del');

Route::resource('/admin/user', 'Admin\UserController');
//必须放在后台路由最后一个，否则会出现优先级问题
Route::resource('/admin', 'Admin\IndexController');