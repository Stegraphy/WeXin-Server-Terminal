<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/27
 * Time: 18:10
 */

namespace app\lib\exception;


use think\Exception;

class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的Banner错误,参数不存在';
    public $errorCode = 40000;
}