<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class LoginMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {           
        $username = $request->input("username");
        $password = $request->input("password");
        $res = DB::select("select password from user where mark=1 and username='{$username}'" );
        if(!$res){
            return redirect("/")->with("states","用戶名錯誤");
        }elseif(md5($password) !== $res[0]->password){
            return redirect("/")->with("states","密码错误");            
        }else{
            return redirect("/admin");//登陆成功
        }
                

        return $next($request);
    }
}
