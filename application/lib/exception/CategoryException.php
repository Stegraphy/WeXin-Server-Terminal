<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/6
 * Time: 20:22
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    //具体错误信息
    public $msg = '指定类目不存在，请检查参数';
    //自定义的错误码
    public $errorCode = 50000;
}