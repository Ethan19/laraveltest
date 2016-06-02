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
Route::post('/authlogin', 'Auth\AuthController@postLogin');
Route::get('/', 'Auth\AuthController@getLogin');
//Route::get('/', array("middleware"=>"auth",function(){}));
Route::post('/auth/register', 'Auth\AuthController@create');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');


//--后台首页
//规则Route::get($a,$b);
/**
 * 1.$a 全部小写命名，命令规则和后台数据库保持一致
 */
Route::get("/admin","Admin\Controller@index");


Route::get("/admin/index/set","Admin\IndexController@set");
/*菜单模块*/
Route::get("/admin/menu","Admin\MenuController@index");

Route::get("/admin/menu/menulist","Admin\MenuController@menulist");
Route::get("/admin/menu/edit/{id}",'Admin\MenuController@edit');
Route::post("/admin/menu/editinfo",'Admin\MenuController@editinfo');
Route::get("/admin/menu/add",'Admin\MenuController@add');
Route::post("/admin/menu/addinfo",'Admin\MenuController@addinfo');
Route::get("/admin/menu/delete",'Admin\MenuController@delete');

/*角色管理*/
Route::get("/admin/roles/roleslist",'Admin\rolesController@roleslist');
Route::get("/admin/roles/edit/{id}",'Admin\rolesController@edit');
Route::post("/admin/roles/editinfo",'Admin\rolesController@editinfo');
Route::get("/admin/roles/add",'Admin\rolesController@add');
Route::post("/admin/roles/addinfo",'Admin\rolesController@addinfo');
Route::get("/admin/roles/delete",'Admin\rolesController@delete');

/*用户管理*/
Route::get("/admin/user/userlist",'Admin\userController@userslist');
Route::get("/admin/user/edit/{id}",'Admin\userController@edit');
Route::post("/admin/user/editinfo",'Admin\userController@editinfo');
Route::get("/admin/user/add",'Admin\userController@add');
Route::post("/admin/user/addinfo",'Admin\userController@addinfo');
Route::get("/admin/user/delete",'Admin\userController@delete');


