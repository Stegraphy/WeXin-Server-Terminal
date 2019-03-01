<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/27
 * Time: 18:02
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    //Http错误状态码：200,404
    public $code = 400;
    //具体错误信息
    public $msg = '参数错误';
    //自定义的错误码
    public $errorCode = 10000;
}