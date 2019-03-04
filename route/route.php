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
Route::get('api/v1/banner/:id','api/v1.Banner/getBanner');
