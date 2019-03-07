<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/7
 * Time: 12:48
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $message = 'Token已过期或无效Token';
    public $errorCode = 10001;
}