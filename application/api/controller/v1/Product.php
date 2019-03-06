<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/6
 * Time: 17:06
 */

namespace app\api\controller\v1;


use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count =15){
        (new Count())->goCheck();
        $product = ProductModel::getMostRecent($count);
        if($product->isEmpty()){
            throw  new ProductException();
        }
        /* $collection = collection($product);
        $product = $collection->hidden(['summary']);  */
        return $product;
    }
}