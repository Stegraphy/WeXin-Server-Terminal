<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/23
 * Time: 23:46
 */

namespace app\sample\controller;


class Test
{
    //http://localhost:8085/Rebel/public/index.php/sample/test/hello
    //通过虚拟路由简化项目URL路径
//F:\Tools\xampp\apache\conf\extra创建虚拟主机z.cn
    public function hello(){
        return "hello,Stegnography!";
    }
}