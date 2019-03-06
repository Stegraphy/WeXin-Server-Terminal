<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/6
 * Time: 19:54
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden=['delete_time','update_time','create_time'];
    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
}