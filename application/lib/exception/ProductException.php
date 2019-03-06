<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/6
 * Time: 17:19
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
    public $coed = 404;
    public $msg = '指定的商品不存在，请检查参数';
    public $errorCode = 20000;
}