<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/1
 * Time: 21:16
 */

namespace app\api\model;


class User extends  BaseModel
{
    public function orders()
    {
        return $this->hasMany('Order', 'user_id', 'id');
    }
    public function address()
    {
        return $this->hasOne('UserAddress', 'user_id', 'id');
    }

    public static function getByOpenID($openid){
        $user=self::where('openid','=',$openid)
            ->find();
        return $user;
    }


}