<?php

namespace app\api\model;

use think\Model;

class Image extends Model
{
    protected $hidden = ['id','from','delete_time','update_time'];

    public function getUrlAttr($value){
//        $c = $value;
        return config('setting.img_prefix').$value;
    }
}
