<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/9
 * Time: 0:39
 */
namespace app\api\controller\v1;
use app\api\model\Search as SearchModel;
use\think\Db;

class Search

{
    public function index()
    {
        $keywords=input('id');//获取搜索关键
        if($keywords) {
            $product = SearchModel::getProductID($keywords);
        }
        return $product;
//        return $this->fetch('search');
    }
    public function order_index()
    {
        $keywords=input('order');//获取搜索关键
        if($keywords) {
            $product = SearchModel::getOrderID($keywords);
        }
        return $product;
//        return $this->fetch('search');
    }

}

