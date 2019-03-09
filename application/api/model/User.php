<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/7
 * Time: 8:48
 */

namespace app\api\model;


class User extends BaseModel
{

    public function address(){
        return $this->hasOne('UserAddress','user_id','id');
    }
    public static function getByOpenID($openid){
        $user = self::where('openid','=',$openid)
        ->find();
        return $user;
    }
}