<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\View\Factory;
use DB;
use Request;
/**
 * 后台基类
 */
class Controller extends BaseController{

/**
 * [__construct 构造方法，公共信息和菜单]
 * @author 1023
 * @date    2016-05-19
 */
	function __construct(){
		$str = "";
		$result = DB::select("select * from menu where mark=1 and parent_id=0 and action='' ");

		foreach ($result as $key => $value) {
			$str .= "<li>";
			$str .= "<a href='javascript:void()'><i class='fa fa-dashboard'></i>".$value->name;
			if((int)$value->parent_id == 0){
				$str .= "<span class='fa arrow'></span></a>";
				$str .= $this->checkChildMneu($value->id);
			}else{
				$str .="</a>";
			}
	        $str .= "</li>";
		}
		view()->share("menu",$str);//菜单
		view()->share('title', "laravel站点");
	}

    public function index(){
    	return view('admin.index');
    }

    private function checkChildMneu($menuId){
    	$childstr = '';
    	$child = DB::select("select * from menu where parent_id={$menuId} and mark=1");
    	foreach ($child as $val) {
	    	$childstr .="<ul class='nav nav-second-level'>";
	    	$childstr .="<li><a href='/admin/".$val->controller."'>".$val->name."</a></li>";
	    	$childstr .="</ul>";
    	}
    	return $childstr;


    }

    function __destruct(){

    }

}
