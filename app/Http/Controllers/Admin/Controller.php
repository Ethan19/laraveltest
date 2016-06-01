<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\View\Factory;
use DB;
use Request;
use Auth;
use Route;
use Session;
/**
 * 后台基类
 */
class Controller extends BaseController{
	private $controller,$action;
/**
 * [__construct 构造方法，公共信息和菜单]
 * @author 1023
 * @date    2016-05-19
 */
	function __construct(){	
		$this->checkLogin();
		$uri = getAdminControllerAndAction();//获取控制器和方法名

		if(is_array($uri)){
			$this->controller = $controller = $uri['controller'];
			$this->action = $action = $uri['action'];
			//获取后台栏目提醒
			$parent = DB::select("select name from menu where mark=1 and parent_id=0 and action='' and controller='{$controller}'");
				//dd($parent);

			if($parent){
				$prev = $parent[0]->name;
				view()->share("prev",$prev);
				$child = DB::select("select name from menu where mark=1 and action='{$action}' and controller='{$controller}'");
				if($child){
					//$next = $child[0]->name;
					//view()->share("next",$next);
				}
			}
		}
		$str = "";
		$result = DB::select("select * from menu where mark=1 and parent_id=0 and action='' ");

		foreach ($result as $key => $value) {
			$str .= "<li>";
			$str .= "<a href='javascript:void()'><i class='fa ".$value->icon."'></i>".$value->name;
			if((int)$value->parent_id == 0){
				$str .= "<span class='fa arrow'></span></a>";
				$str .= $this->checkChildMenu($value->id);
			}else{
				$str .="</a>";
			}
	        $str .= "</li>";
		}

		view()->share("username",Auth::user()['username']);
		view()->share("menu",$str);//菜单
		view()->share('title', "laravel站点");
	}

    public function index(){
    	if (Auth::check())
			{
				return redirect("/");
			}
    	return view('admin.index');
    }

    private function checkChildMenu($menuId){
    	$childstr = '';
    	$child = DB::select("select * from menu where parent_id={$menuId} and mark=1");
    	foreach ($child as $val) {
    		if($val->controller == $this->controller && $val->action == $this->action){
    			$childstr .="<ul class='nav nav-second-level in'>";
    		}else{
    			$childstr .="<ul class='nav nav-second-level' style='background-color:gray'>";
    		}
	    	$childstr .="<li><a href='/admin/{$val->controller}/{$val->action}'>{$val->name}</a></li>";
	    	$childstr .="</ul>";
    	}
    	return $childstr;


    }

    /**
     * [checkLogin 检查是否登录]
     * @author 1023
     * @date          2016-05-30
     * @return [type] [description]
     */
   	private function checkLogin(){
   		if(!Auth::check()){
   			return redirect("/");
   		}
   	}

    function __destruct(){

    }

}
