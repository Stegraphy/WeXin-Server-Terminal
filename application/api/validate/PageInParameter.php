<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/13
 * Time: 20:07
 */

namespace app\api\validate;


class PageInParameter extends BaseValidate
{
    protected $rule = [
        'page' => 'isPositiveInteger',
        'size' => 'isPositiveInteger'
    ];

    protected $message = [
        'page' => '分页参数必须是正整数',
        'size' => '分页参数必须是正整数'
    ];
}