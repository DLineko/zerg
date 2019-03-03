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
          if($keywords){
              $where['a.name'] = ['like','%'.$keywords.'%'];
          }
          $keywords = Db::table('product')
              ->alias('a')
              ->join('category b','a.category_id=b.id')
              ->field('a.*,b.name as category_name')
              ->where($where)
              ->select();

         echo ($keywords);
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