<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/25
 * Time: 17:03
 */
return [
    'app_id'=>'wx445fa3d3ad84b196',
    'app_secret'=>'f7cc5ebf6ac6cc274e9a94e1f989df54',
    'login_url'=>"https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
    // 微信获取access_token的url地址
    'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
        "grant_type=client_credential&appid=%s&secret=%s",
];