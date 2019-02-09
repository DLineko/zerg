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
              $where['name'] = ['like','%'.$keywords.'%'];
          }
          $keywords = Db::table('product')->where($where)->select();
         echo ($keywords);
      }
    }
}