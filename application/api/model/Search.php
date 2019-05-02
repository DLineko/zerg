<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/9
 * Time: 22:38
 */

namespace app\api\model;
use think\Db;
class Search
{
    public static  function getProductID($keywords){
      {
          $keyword=urldecode($keywords);
          if($keyword){
              $where['a.name'] = ['like','%'.$keyword.'%'];
          }
          $keyword = Db::table('product')
              ->alias('a')
              ->join('category b','a.category_id=b.id')
              ->field('a.*,b.name as category_name')
              ->where($where)
              ->select();
         return $keyword;
      }
    }
    public static  function getOrderID($keywords){
        {
            if($keywords){
                $where['order_no'] = ['like','%'.$keywords.'%'];
            }
            $keywords = Db::table('order')
            ->where($where)
            ->select();
            echo ($keywords);
        }
    }
}