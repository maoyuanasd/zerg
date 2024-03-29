<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


use think\Route;

//Route::rule('路由表达式','路由地址','请求类型','路由参数(数组)','变量规则(数组)');

//请求类型 GET,POST,DELETE,PUT,*

//Route::rule('hello','sample/Test/hello','GET',['https'=>false]);
//Route::rule('hello','sample/Test/hello','GET|POST',['https'=>false]);
//Route::post('hello/:id','sample/Test/hello');
//Route::post('hello','sample/Test/hello');
//Route::any('hello','sample/Test/hello');

Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

Route::get('api/:version/product/by_category','api/:version.product/getAllInCategory');
Route::get('api/:version/product/:id','api/:version.product/getOne',[],['id'=>'\d+']);
Route::get('api/:version/product/recent','api/:version.product/getRecent');

//Route::group('api/:version/product',function(){
//    Route::get('/by_category','api/:version.product/getAllInCategory');
//    Route::get('/:id','api/:version.product/getOne',[],['id'=>'\d+']);
//    Route::get('/recent','api/:version.product/getRecent');
//
//});

Route::get('api/:version/category/all','api/:version.category/getAllCategories');

Route::post('api/:version/token/user','api/:version.Token/getToken');
Route::post('api/:version/token/verify','api/:version.Token/verifyToken');
Route::post('api/:version/token/app', 'api/:version.Token/getAppToken');

Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');
Route::get('api/:version/address','api/:version.Address/getUserAddress');

Route::post('api/:version/order','api/:version.Order/placeOrder');
Route::get('api/:version/order/:id','api/:version.Order/getDetail',[],['id'=>'\d+']);
Route::get('api/:version/order/by_user','api/:version.Order/getSummaryByUser');
Route::get('api/:version/order/paginate', 'api/:version.Order/getSummary');
Route::put('api/:version/order/delivery', 'api/:version.Order/delivery');


Route::post('api/:version/pay/pre_order','api/:version.Pay/getPreOrder');
Route::post('api/:version/pay/notify','api/:version.Pay/receiveNotify');
Route::post('api/:version/pay/re_notify','api/:version.Pay/redirectNotify');
