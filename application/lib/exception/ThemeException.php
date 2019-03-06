<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/6
 * Time: 13:47
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $coed = 404;
    public $msg = '指定的主题不存在，请检查主题ID';
    public $errorCode = 30000;
}