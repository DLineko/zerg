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

//Route::rule('hello','sample/Test/hello');

Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');

Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

//Route::get('api/:version/product/by_category','api/:version.Product/getAllInCategory');
//Route::get('api/:version/product/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
//Route::get('api/:version/product/recent','api/:version.Product/getRecent');

Route::group('api/:version/product',function(){
    Route::get('/by_category', 'api/:version.Product/getAllInCategory');
    Route::get('/:id', 'api/:version.Product/getOne',[],['id'=>'\d+']);
    Route::get('/recent', 'api/:version.Product/getRecent');
});

Route::get('api/:version/category/all','api/:version.Category/getAllCategories');

Route::post('api/:version/token/user','api/:version.Token/getToken');
Route::post('api/:version/token/app', 'api/:version.Token/getAppToken');

Route::post('api/:version/token/verify', 'api/:version.Token/verifyToken');

Route::post('api/:version/address', 'api/:version.Address/createOrUpdateAddress');
Route::get('api/:version/address', 'api/:version.Address/getUserAddress');

Route::post('api/:version/order', 'api/:version.Order/placeOrder');
Route::put('api/:version/order/delivery', 'api/:version.Order/delivery');

Route::get('api/:version/order/by_user', 'api/:version.Order/getSummaryByUser');
Route::get('api/:version/order/paginate', 'api/:version.Order/getSummary');

Route::get('api/:version/order/:id', 'api/:version.Order/getDetail',[], ['id'=>'\d+']);
Route::post('api/:version/pay/pre_order', 'api/:version.Pay/getPreOrder');
Route::post('api/:version/pay/notify', 'api/:version.Pay/receiveNotify');
Route::post('api/:version/pay/re_notify', 'api/:version.Pay/redirectNotify');
//搜索
Route::get('api/:version/search_product/:id', 'api/:version.Search/index');
Route::get('api/:version/search_order/:order', 'api/:version.Search/order_index');

Route::get('api/:version/product/getAllproduct', 'api/:version.Product/getProducts');
//删除
Route::get('api/:version/product/deleteOne/:id', 'api/:version.Product/deleteOne');
//修改
Route::put('api/:version/product/edit', 'api/:version.Product/editProducts');
//新增
Route::post('api/:version/product/add', 'api/:version.Product/addProducts');
//图片
Route::post('api/:version/upImage/upload', 'api/:version.UpImage/getImage');

//分类
Route::get('api/:version/category/category_name','api/:version.Category/getCategory_name');
