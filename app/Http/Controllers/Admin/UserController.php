<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    //
    public static function create($arr){
    	$isRes = DB::select("select id from users where username='{$arr['username']}'");
    	if($isRes){
    		return -1;//用户名已存在
    	}else{
    		$res = array(
    				"username"=>$arr['username'],
    				'password'=>bcrypt($arr['password']),
    				'remember_token'=>$arr['_token'],
    				);
    		return DB::table('users')->insert($res);
    	}

    }
}
