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
//        'num' => 'in:1,2,3'
    ];

    protected  $message = [
        'id' => 'id必须是正整数'
    ];
}