<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use DB;
use Request;
use Validator;
use Redirect;
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


    /**
     * 自定义验证消息
     * @var array
     */
    public $msg = array(
        'usernamename.required'=>'请填写菜单名称',
    );
    /**
     * [validator description]
     * @author 1023
     * @date          2016-05-31
     * @return [type] [description]
     */
    public function validator(array $data){
        $rules = array(
                'username'=>'required',
            );
        return Validator::make($data,$rules,$this->msg); 
    }

    /**
     * [userslist 菜单列表]
     * @author 1023
     * @date          2016-05-31
     * @return [type] [description]
     */
    public function userslist()
    {
        $users = DB::select('select * from users where mark=1 order by add_time desc');                            
        view()->share("result",$users);
        return view("users.userslist");
    }


    /**
     * [edit 修改信息页]
     * @author 1023
     * @date          2016-05-31
     * @param  [type] $id        [description]
     * @return [type]            [description]
     */
    public function edit($id){
        $info = DB::table('users')->find($id);
        view()->share("info",$info);
        return view("users.edit");

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
            $res = DB::table('users')->where('id','=',$id)->update(array(
                    'username'=>$data['username'],
                    'update_time'=>time()
                ));
            if($res){
                return Redirect::to('/admin/user/userlist')->with("success","修改成功");
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
        $list = DB::select("select id,name from users where mark=1 and parent_id=0");//父级
        view()->share("list",$list);
        return view("users.add");
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
            $res = DB::table('users')->insert(array(
                    'username'=>$data['username'],
                    'add_time'=>time()
                ));
            if($res){
                return Redirect::to('/admin/user/userlist')->with("success","新增成功");
            }else{
                return Redirect::back()->with("fails","新增失败");
            }

        }else{
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }


    public function delete(Request $request){
        $id = $request::input('id');
        $res = DB::table('users')->delete($id);
        if($res){
            echo json_encode(array('status'=>'success','msg'=>'删除成功'));
        }else{
            echo json_encode(array('status'=>'fails','msg'=>"删除失败"));            
        }
    }




}
