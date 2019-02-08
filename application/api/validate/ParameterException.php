<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/23
 * Time: 0:53
 */

namespace app\api\validate;


use app\lib\exception\BaseException;

class ParameterException extends BaseException
{
    public $code=400;
    public $msg='参数错误';
    public $errorCode=10000;
}