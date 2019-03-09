<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/7
 * Time: 10:58
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Exception;
use think\facade\Cache;
use think\facade\Request;

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

    public static function getCurrentTokenVal($key){
        $token = Request::header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }else{
           if(!is_array($vars)){
               $vars = json_decode($vars,true);
//               print_r($vars);
           }
           if(array_key_exists($key,$vars)){
               return $vars[$key];
           }else{
               throw new Exception('尝试获取的Token变量并不存在');
           }
        }
    }
    public static function getCurrenUid(){
        //token
        $uid = self::getCurrentTokenVal('uid');
        return $uid;
    }
}