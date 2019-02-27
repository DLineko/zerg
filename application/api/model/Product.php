<?php

namespace app\api\model;

use think\Model;
use think\Db;
class Product extends BaseModel
{
    protected $autoWriteTimestamp = 'datetime';
    protected $hidden = [
        'delete_time', 'main_img_id', 'pivot', 'from', 'category_id',
        'create_time', 'update_time'];

    /**
     * 图片属性
     */
    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }


    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    /**
     * 获取某分类下商品
     * @param $categoryID
     * @param int $page
     * @param int $size
     * @param bool $paginate
     * @return \think\Paginator
     */
    public static function getProductsByCategoryID(
        $categoryID, $paginate = true, $page = 1, $size = 30)
    {
        $query = self::
        where('category_id', '=', $categoryID);
        if (!$paginate)
        {
            return $query->select();
        }
        else
        {
            // paginate 第二参数true表示采用简洁模式，简洁模式不需要查询记录总数
            return $query->paginate(
                $size, true, [
                'page' => $page
            ]);
        }
    }

    /**
     * 获取商品详情
     * @param $id
     * @return null | Product
     */
    public static function getProductDetail($id)
    {
        //千万不能在with中加空格,否则你会崩溃的
        //        $product = self::with(['imgs' => function($query){
        //               $query->order('index','asc');
        //            }])
        //            ->with('properties,imgs.imgUrl')
        //            ->find($id);
        //        return $product;

        $product = self::with(
            [
                'imgs' => function ($query)
                {
                    $query->with(['imgUrl'])
                        ->order('order', 'asc');
                }])
            ->with('properties')
            ->find($id);
        return $product;
    }

    public static function getMostRecent($count)
    {
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }
    public static function getProducts()
    {
         $products = Db::table('product')->select();
         return $products;

    }
   /*修改商品*/
    public static function editProducts()
    {
        $dataForm = input();
        $id=$dataForm['id'];
        $name=$dataForm['name'];
        $price=$dataForm['price'];
        $stock=$dataForm['stock'];
        $main_img_url=$dataForm['main_img_url'];

        $data=[
            'name'=>$name,
            'price'=>$price,
            'stock'=>$stock,
            'main_img_url'=>$main_img_url
        ];
        $products=Db::table('product')
            ->where('id','=',$id)
            ->update($data);
        return $products;
    }
    public static function addProducts()
    {
        $dataForm = input();
//        $id=$dataForm['id'];
        $name=$dataForm['name'];
        $price=$dataForm['price'];
        $stock=$dataForm['stock'];
        $main_img_url=$dataForm['main_img_url'];

        $data=[
            'name'=>$name,
            'price'=>$price,
            'stock'=>$stock,
            'main_img_url'=>$main_img_url
        ];
        $products=Db::table('product')
//            ->where('id','=',$id)
            ->insert($data);
        return $products;
    }

}
