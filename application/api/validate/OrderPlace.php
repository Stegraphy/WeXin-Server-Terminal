<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/9
 * Time: 18:38
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
//   只是实例代码，演示使用
      protected $oProducts = [
        [
            'product_id' => 1,
            'count' => 3
        ],
        [
            'product_id' => 2,
            'count' => 3
        ],
        [
            'product_id' => 3,
            'count' => 3
        ]
    ];

    protected $products = [
        [
            'product_id' => 1,
            'count' => 3
        ],
        [
            'product_id' => 2,
            'count' => 3
        ],
        [
            'product_id' => 3,
            'count' => 3
        ]
    ];

    protected $rule = [
        'products' => 'checkProducts'
    ];

    protected $singRule = [
        'product_id' => 'require|isPositiveInteger',
         'count' => 'require|isPositiveInteger',
    ];

    protected function checkProducts($values){
        if(!is_array($values)){
            throw new ParameterException([
               'msg' => '商品参数不正确吗'
            ]);
        }

        if(empty($values)){
            throw new ParameterException([
                'msg' => '商品列表不能为空'
            ]);
        }

        foreach ($values as $value){
            $this->checkProduct($value);
        }
        return true;

    }
    protected function checkProduct($value){
        $validate = new BaseValidate($this->singRule);
        $result=$validate->check($value);
        if(!$result){
            throw new ParameterException([
               'msg' => '商品列表参数错误'
            ]);
        }
    }
}