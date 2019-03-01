<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/26
 * Time: 11:00
 */

namespace app\api\validate;

use think\Exception;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //获取http参数
        //对这些参数进行校验
        $params= Request::param();
//        $param = $request->param('id');
        $result = $this->check($params);
        if(!$result){
            $error = $this->error;
           throw new  Exception($error);
        }else{
            return true;
        }
    }
}