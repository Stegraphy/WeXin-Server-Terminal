<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/26
 * Time: 0:32
 */

namespace app\validate;


use think\Validate;

class TestValidate extends Validate
{
    //验证器
    protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ];
}