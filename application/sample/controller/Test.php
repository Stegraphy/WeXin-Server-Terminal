<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/23
 * Time: 23:46
 */

namespace app\sample\controller;

use think\facade\Request;
class Test
{

    //http://localhost:8085/Rebel/public/index.php/sample/test/hello
    //通过虚拟路由简化项目URL路径-->z.cn:8085/sample/test/hello
//F:\Tools\xampp\apache\conf\extra创建虚拟主机z.cn
    public function hello($id,$name){
        echo $id;
        echo '|';
        echo $name;
        return "hello,Stegnography!";
    }

    public function request(){
/*      $id =Request::param('id');
        $name = Request::param('name');
        echo $id;
        echo '|';
        echo $name;*/
    /*    echo Request::param('id');
        echo Request::param('name');*/
//        echo $request->id;
//        echo $name->name;
        echo Request::param('id');
        echo Request::param('name');
        echo Request::param('age');
/*        $all = input('param.');
        var_dump($all);*/
    }
}