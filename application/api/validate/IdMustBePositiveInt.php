<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/26
 * Time: 1:23
 */

namespace app\api\validate;


use think\Validate;

class IdMustBePositiveInt extends BaseValidate
{
    protected $rule = [
      'id' => 'require|IsPositiveInteger',
        'num' => 'in:1,2,3'
    ];
    protected function IsPositiveInteger($value,$rule = '',$data = '',$filed = ''){
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){

//            echo 'success!';
            return true;

        }else{
            return $filed.'必须是正整数';
        }
    }
}