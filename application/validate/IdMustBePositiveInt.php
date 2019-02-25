<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/26
 * Time: 1:23
 */

namespace app\validate;


use think\Validate;

class IdMustBePositiveInt extends Validate
{
    protected $rule = [
      'id' => 'require|IsPositiveInteger'
    ];
    protected function IsPositiveInteger($value,$rule = '',$data = '',$filed = ''){
        if(is_numeric($value)&&is_int($value+0)&&($value+0)>0){
            return true;
        }else{
            echo $filed.'必须是正整数';
        }
    }
}