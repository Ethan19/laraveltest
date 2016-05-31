<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;

class IndexController extends Controller
{
    
    /**
     * [index 首页]
     * @author 1023
     * @date          2016-05-30
     * @return [type] [description]
     */
    public function set(){
        return view("index.index");
    }
}
