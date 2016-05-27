<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Admin\UserController as User;
// use App\User;
use Validator;
// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\ThrottlesLogins;
// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
// use auth;
use Auth;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    // use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
     protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        $errorMsg = '';
        $validator = Validator::make($data, array('username'=>'required|max:225','password' => 'required|min:6'));
        if($validator->fails()){
            if($validator->messages()->has("username")){ 
                $errorMsg  = $validator->messages()->first("username");
            }elseif($validator->messages()->has("password")){  
                $errorMsg  = $validator->messages()->first("password");             
            }
        }
        return $errorMsg?$errorMsg:false;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create()
    {
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $msg = $this->validator($data);
        if($msg){
            return redirect("/")->with("status",$msg);
        }else{
            $res = User::create($_POST);
            if($res === TRUE){
                $msg = $_POST['username']."注册成功";
            }elseif((int)$res < 0){
                $msg = $_POST['username']."注册失败，用户名已经存在";
            }
            return  redirect("/")->with("status",$msg);
        }

    }

    /**
     * [getLogin 登录页面]
     * @author 1023
     * @date          2016-05-25
     * @return [type] [description]
     */
    public function getLogin(){
        return view('login.index');
    }


    /**
     * [postLogin 登录动作]
     * @author 1023
     * @date          2016-05-25
     * @return [type] [description]
     */
    public function postLogin(){
        $res = Auth::attempt(array('username' => $_POST['username'], 'password' => $_POST['password']));
        if ($res){
            // 认证通过...
            return redirect()->intended('/admin');
        }else{
            return redirect('/');
        }
    }
}
