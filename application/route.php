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
Route::get('api/:version/product/recent','api/:version.product/getRecent');
Route::get('api/:version/product/by_category','api/:version.product/getAllInCategory');
Route::get('api/:version/category/all','api/:version.category/getAllCategories');
Route::post('api/:version/token/user','api/:version.Token/getToken');