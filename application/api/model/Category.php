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
            ->alias('a')

            ->join('image b','a.topic_img_id=b.id')

//            ->field('a.*,b.name as category_id')
            ->field('a.*,b.url as topic_img_url')
            ->order('a.id')
            ->select();
        return $categories_name;
    }
    public static function addCategories_name()
    {
        $dataForm = input();
        $name=$dataForm['name'];
        $topic_img_name=$dataForm['topic_img_name'];
        $image_data=[
            'url'=>$topic_img_name
        ];
        $category=Db::table('image')
            ->insert($image_data);
            $img_id=Db::table('image')->where('url','=',$topic_img_name)->value('id');
        $category_data=[
            'name'=>$name,
            'topic_img_id'=>$img_id
        ];
        Db::table('category')
            ->insert($category_data);
        return $category;
    }
    public static function getCategoryOne($id)
    {
        $categorie = Db::table('category')
            ->alias('a')
            ->join('image b','a.topic_img_id=b.id')
            ->field('a.*,b.url as topic_img_url')
            ->where('a.id','=',$id)
            ->find();
        return $categorie;
    }
    public static function editCategoryOne()
    {
        $dataForm = input();
        $id=$dataForm['id'];
        $name=$dataForm['name'];
//        $topic_img_id=$dataForm['topic_img_id'];
        $topic_img_name=$dataForm['topic_img_name'];
        $img_id=Db::table('category')->where('id','=',$id)->value('topic_img_id');
        $category_data=[
            'name'=>$name,
            'topic_img_id'=>$img_id
        ];
        Db::table('category')
            ->where('id','=',$id)
            ->update($category_data);
        $image_data=[
            'url'=>$topic_img_name
        ];
        Db::table('image')
            ->where('id','=',$img_id)
            ->update($image_data);
        return $category_data;
    }
    public static  function getProductID($keywords){
        {
            if($keywords){
                $where['a.name'] = ['like','%'.$keywords.'%'];
            }
            $keywords = Db::table('category')
                ->alias('a')
                ->join('image b','a.topic_img_id=b.id')
                ->field('a.*,b.url as topic_img_url')
                ->where($where)
                ->select();

            echo ($keywords);
        }
    }

}