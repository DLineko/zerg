<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4
 * Time: 20:49
 */

namespace app\api\controller\v2;


class Banner
{
    /* 获取指定id的banner信息
     * @id banner的id号
     * @url /banner/ :id
     * @http GET
     * */
    public function getBanner($id)
    {     //AOP 面向切面编程
        return "This is v2 version";
    }
}