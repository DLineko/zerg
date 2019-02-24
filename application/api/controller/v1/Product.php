<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/31
 * Time: 20:46
 */

namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;
use think\Controller;
class Product extends Controller
{
    public function getRecent($count=15){
        (new Count())->goCheck();
        $products=ProductModel::getMostRecent($count);
        if($products->isEmpty()){
            throw  new ProductException();
        }
        $products=$products->hidden(['summary']);
        return $products;
    }
    public  function  getAllInCategory($id){
        (new IDMustBePostiveInt())->goCheck();
        $products =ProductModel::getProductsByCategoryID($id);
        if($products->isEmpty()){
            throw  new ProductException();
        }
        $products=$products->hidden(['summary']);
        return $products;
    }
    public function getOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if (!$product)
        {
            throw new ProductException();
        }
        return $product;
    }
    public function deleteOne($id)
    {
        ProductModel::destroy($id);
    }
    /*管理员模块获取全部商品*/
    public function getProducts(){
        $product = ProductModel::getProducts();
        return $product;
    }
    /*管理员模块修改商品*/
    public function editProducts(){
        $product = ProductModel::editProducts();
        if($product)
            return '修改成功！';
    }

}