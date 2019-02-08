<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/31
 * Time: 20:49
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected  $rule=[
        'count'=>'isPositiveInteger|between:1,15'
    ];

}