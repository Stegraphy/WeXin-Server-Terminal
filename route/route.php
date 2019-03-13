<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
/*
Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::rule('hello','sample/Test/hello');
return [

];*/
//use think\Route;
/* 路由规则： Route::rule('路由表达式','路由地址','请求方式','路由参数（数组）','变量规则(数组）');
 *  'url_lazy_route'         => false,开启强制使用路由
 */
//Route::rule('hello','sample/Test/hello');
//Route::rule('hello','sample/Test/hello','GET|POST',['https'=>false]);
Route::get('hello/:id','sample/Test/hello');
Route::post('request/:id','sample/Test/request');
//Route::any();
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

//Route::get('api/:version/product/recent','api/:version.Product/getRecent');
//Route::get('api/:version/product/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
//Route::get('api/:version/product/by_category','api/:version.Product/getAllInCategory');

\think\facade\Route::group('api/:version/product',function (){
    Route::get('/recent','api/:version.Product/getRecent');
    Route::get('/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
    Route::get('/by_category','api/:version.Product/getAllInCategory');
});

Route::get('api/:version/category/all','api/:version.Category/getAllCategories');
Route::post('api/:version/token/user','api/:version.Token/getToken');

Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');

//Route::get('api/:version/second','api/:version.Address/second');前置方法测试

Route::post('api/:version/order','api/:version.Order/placeOrder');
Route::get('api/:version/order/:id','api/:version.Order/getDetail',[],['id'=>'\d+']);
Route::post('api/:version/by_user','api/:version.Order/getSummaryOrderByUser');

Route::post('api/:version/pay/pre_order','api/:version.Pay/getPreOrder');
Route::post('api/:version/pay/notify','api/:version.Pay/receiveNotify');