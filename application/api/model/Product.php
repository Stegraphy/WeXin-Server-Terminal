<?php

namespace app\api\model;

class Product extends BaseModel
{
    protected $hidden = [
      'delete_time','main_img_id','pivot','from','category_id',
      'create_time','update_time'
    ];

    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }

    public function imgs(){
       return  $this->hasMany('ProductImage','product_id','id');
    }

    public function properties(){
        return $this->hasMany('ProductProperty','product_id','id');
    }

    public static function getMostRecent($count){
        $product = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $product;
    }

    public static function getProductsByCategoryID($categoryID){
        $products = self::where('category_id','=',$categoryID)
            ->select();

        return $products;
    }

    public static function getProductDetail($id){
     $product = self::with([
            'imgs' => function($query){
                $query->with(['imgUrl'])
                    ->order('order','asc');
            },
         'properties'
        ])
          ->find($id);
    /*
          闭包构造器解决Order排序问题，不起作用，所以Order】排序失效
            原因是TP5.1with方法只能调用一次，请不要多次调用，如果需要对多个关联模型预载入使用数组即可。
            ->with(['properties'])*/
/*  $product = self::with('imgs.imgUrl,properties')
            ->find($id);*/
/*        $product = self::with([
                'imgs' => function ($query)
                {
                    $query->with(['imgUrl'])
                        ->order('order', 'asc');
                }])
//            ->with(['properties'])
            ->find($id);*/
        return $product;
    }
}
