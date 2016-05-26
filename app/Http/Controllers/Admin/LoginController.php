<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
// use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    


    /**
     * [index 后台登录首页]
     * @author 1023
     * @date          2016-05-24
     * @return [type] [description]
     */
    public function index(){
    	return view('login.index');
    }



    public function sign(){
    	var_dump($_POST);die;


    }



}
