<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/1
 * Time: 22:54
 */
return [
    'app_id'=>'wx6b17bd45a507d711',
    'app_secret'=>'2cb496dbe00cd9564402823416b3bd79',
    'login_url'=>'https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code',
    // 微信获取access_token的url地址
    'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
    "grant_type=client_credential&appid=%s&secret=%s",
];