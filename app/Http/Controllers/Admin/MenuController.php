<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use DB;
use Request;
use Validator;
use Redirect;

class MenuController extends Controller{

    /**
     * 自定义验证消息
     * @var array
     */
    public $msg = array(
        'name.required'=>'请填写菜单名称',
        'controller.required'=>'请输入控制器名称',
        'action.required'=>'请输入方法名称'
    );
    /**
     * [validator description]
     * @author 1023
     * @date          2016-05-31
     * @return [type] [description]
     */
    public function validator(array $data){
        $rules = array(
                'name'=>'required',
                'controller'=>'required'
            );
        return Validator::make($data,$rules,$this->msg); 
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
        $info = DB::table('menu')->find($id);
        $list = DB::select("select id,name from menu where mark=1 and parent_id=0");//父级
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
        $data = $request::all();
        $id = $request::input('id');
        $validator = $this->validator($data);
        if($validator->passes()){
            //修改成功返回1，失败返回0
            $res = DB::table('menu')->where('id','=',$id)->update(array(
                    'name'=>$data['name'],
                    'controller'=>$data['controller'],
                    'action'=>$data['action'],
                    'icon'=>$data['icon'],
                    'parent_id'=>$data['parent_id'],
                    'update_time'=>time()
                ));
            if($res){
                return Redirect::to('/admin/menu/menulist')->with("success","修改成功");
            }else{
                return Redirect::back()->with("fails","修改失败");
            }

        }else{
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }


    /**
     * [add 增加惨淡]
     * @author 1023
     * @date    2016-06-01
     */
    public function add(){
        $list = DB::select("select id,name from menu where mark=1 and parent_id=0");//父级
        view()->share("list",$list);
        return view("menu.add");
    }


    /**
     * [addinfo 执行增加菜单]
     * @author 1023
     * @date           2016-06-01
     * @param  Request $request   [description]
     * @return [type]             [description]
     */
    public function addinfo(Request $request){
        $data = $request::all();
        $validator = $this->validator($data);
        if($validator->passes()){
            //修改成功返回1，失败返回0
            $res = DB::table('menu')->insert(array(
                    'name'=>$data['name'],
                    'controller'=>$data['controller'],
                    'action'=>$data['action'],
                    'icon'=>$data['icon'],
                    'parent_id'=>$data['parent_id'],
                    'add_time'=>time()
                ));
            if($res){
                return Redirect::to('/admin/menu/menulist')->with("success","新增成功");
            }else{
                return Redirect::back()->with("fails","新增失败");
            }

        }else{
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }


    public function delete(Request $request){
        $id = $request::input('id');
        $res = DB::table('menu')->delete($id);
        if($res){
            echo json_encode(array('status'=>'success','msg'=>'删除成功'));
        }else{
            echo json_encode(array('status'=>'fails','msg'=>"删除失败"));            
        }
    }



}
