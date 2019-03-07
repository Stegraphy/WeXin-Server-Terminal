<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/7
 * Time: 10:07
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $message = '微信服务器接口调用失败';
    public $errorCode = 999;
}