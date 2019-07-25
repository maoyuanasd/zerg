<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/25
 * Time: 16:33
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
   protected $rule=[
       'code'=>'require|isNotEmpty'
   ];
    protected $message=[
        'code'=>'没有code码'
    ];
}