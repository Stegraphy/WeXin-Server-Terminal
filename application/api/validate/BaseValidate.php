<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/26
 * Time: 11:00
 */

namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\Exception;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //获取http参数
        //对这些参数进行校验
        $params= Request::param();
        $result = $this->batch()->check($params);
        if(!$result){
            $e = new ParameterException([
                'msg' => $this->error,
            ]);
//            $e->msg=$this->error;
            throw $e;
//            $error = $this->error;
//           throw new  Exception($error);
        }else{
            return true;
        }
    }

    protected function IsPositiveInteger($value,$rule = '',$data = '',$filed = ''){
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){

//            echo 'success!';
            return true;

        }else{
//            return $filed.'必须是正整数';
            return false;
        }
    }

    protected function isNotEmpty($value,$rule = '',$data = '',$filed = ''){
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }
}