<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/7
 * Time: 10:58
 */

namespace app\api\service;


class Token
{
    public static function generateToken(){
        //32个字符组成的一组随记字符串
        $randChars = getRandChars(32);
        //用三组字符串，进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME'];
        //salt盐
        $salt = config('secure.token_salt');
        return md5($randChars.$timestamp.$salt);
    }
}