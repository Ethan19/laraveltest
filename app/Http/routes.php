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


//后台路由
Route::get("admin/","Admin\Controller@index");
// Route::get("admin/{id}",function($id){
// 	return $id;
// });
Route::get("admin/menu","Admin\MenuController@index");
Route::match(['get', 'post'], '/', function () {
    return 'Hello World';
});
//Route::get("foo",['uses'=>'fooController@method','as'=>'name']);
// Route::get("profile",['middleware'=>'auth','uses'=>'UserController@showProfile']);


