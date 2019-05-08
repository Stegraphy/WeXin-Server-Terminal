<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/26
 * Time: 11:00
 */

namespace app\api\validate;

use app\lib\exception\ParameterException;
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

    //没有使用TP的正则验证，集中在一处方便以后修改
    //不推荐使用正则，因为复用性太差
    //手机号的验证规则
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
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

    public function getDataByRole($arrays){
         if(array_key_exists('uid',$arrays) |
             array_key_exists('user_id',$arrays)
         ){
             //不允许包含user_id,uid，防止恶意非法的覆盖user_id外键
             throw new ParameterException([
                 'msg' => '参数中包含有非法的参数名user_id,或者uid'
             ]);
         }
         $newArray = [];
        foreach ($this->rule as $key => $value){
            $newArray[$key] = $arrays[$key];
        }
         return $newArray;
    }
}