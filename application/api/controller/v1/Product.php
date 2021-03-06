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
use app\api\validate\IdMustBePositiveInt;
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
        $product = $product->hidden(['summary']);
        return $product;
    }
    public function getAllInCategory($id){
        (new IdMustBePositiveInt())->goCheck();
        $products = ProductModel::getProductsByCategoryID($id);

        if($products->isEmpty()){
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }

    public function getOne($id){
        (new IdMustBePositiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if($product->isEmpty()){
            throw new ProductException();
        }
        return $product;
    }

    public function deleteOne($id){
        //使用令牌鉴定用户的身份

    }
}