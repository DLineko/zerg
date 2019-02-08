<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/3
 * Time: 22:20
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected  $hidden=[
        'img_id','delete_time','product_id'];
    public function imgUrl(){
        return $this->belongsTo('Image','img_id','id');
    }
}