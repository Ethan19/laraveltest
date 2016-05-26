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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get("user","UserController@showProfile");
// Route::get("admin/",[
// 	'as'=>"admin",'uses'=>'UserController@admin'
// 	]);
// Route::get("foo","Photos\AdminController@method");
// Route::get("/","Home\Controller@index");
// Route::get("admin/{id}",function($id){
// 	return $id;
// });
//Route::get("foo",['uses'=>'fooController@method','as'=>'name']);
// Route::get("profile",['middleware'=>'auth','uses'=>'UserController@showProfile']);


//后台路由
//--登录
/*---------------
	须知：在mac环境下url必须带有index.php，否则报错
-------------*/
//Route::get("/","Admin\LoginController@index");
//Route::get("/","Admin\LoginController@index");

//Route::post("admin/login/sign","Admin\LoginController@sign");
Route::post("admin/login/sign",array("middleware"=>"login",function(){}));
//Route::post("admin/login/sign",function(){
// 	return 111111111;
// });

//登录路由
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


//--后台首页
Route::get("/admin","Admin\Controller@index");

Route::get("/admin/menu","Admin\MenuController@index");



