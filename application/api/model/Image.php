<?php

namespace app\api\model;

use think\Model;

class Image extends Model
{
    protected $hidden = ['id','from','delete_time','update_time'];

    public function getUrlAttr($value,$date){
//        $c = $value;
        $finalUrl = $value;
        if($date['from'] == 1){
            $finalUrl =  config('setting.img_prefix').$value;
        }
            return $finalUrl;
    }
}
