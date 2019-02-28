<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/1
 * Time: 13:13
 */

namespace app\api\model;


use think\Db;

class Category extends BaseModel
{
    protected $hidden =['delete_time','update_time','create_time'];
    public function products()
    {
        return $this->hasMany('Product', 'category_id', 'id');
    }
    public  function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
    public static function getCategory($id)
    {
        $category = self::with('products')
            ->with('products.img')
            ->find($id);
        return $category;
    }
    public static function getCategories($ids)
    {
        $categories = self::with('products')
            ->with('products.img')
            ->select($ids);
        return $categories;
    }
    public static function getCategories_name()
    {
        $categories_name = Db::table('category')
            ->select();
        return $categories_name;
    }
}