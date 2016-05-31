<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use DB;
use Request;
use validator;
class MenuController extends Controller{


    /**
     * [validator description]
     * @author 1023
     * @date          2016-05-31
     * @return [type] [description]
     */
    private function validator(array $data){
        $rules = array(
                'name'=>'required',
                'Controller'=>'required',
            );
        $validator = Validator::make($data,$rules,$message); 
    }

	/**
	 * [menulist 菜单列表]
	 * @author 1023
	 * @date          2016-05-31
	 * @return [type] [description]
	 */
    public function menulist()
    {
    	$menu = DB::table('menu')->where("mark","=","1")->orderBy("add_time","asc")->paginate(10);    			
    	view()->share("result",$menu);
    	return view("menu.menulist");

    }


    /**
     * [edit 修改信息页]
     * @author 1023
     * @date          2016-05-31
     * @param  [type] $id        [description]
     * @return [type]            [description]
     */
    public function edit($id){
        $list = DB::select("select id,name from menu where mark=1 and parent_id=0");//父级
        $info = DB::table('menu')->find($id);
        view()->share("info",$info);
        view()->share("list",$list);
    	return view("menu.edit");
    }

    /**
     * [editInfo 执行修改信息]
     * @author 1023
     * @date          2016-05-31
     * @return [type] [description]
     */
    public function editInfo(Request $request){
        dd($request::input());
    }



}
