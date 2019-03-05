<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    //
    protected function prefixImgUrl($value,$date){
//        $c = $value;
        $finalUrl = $value;
        if($date['from'] == 1){
            $finalUrl =  config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
}
