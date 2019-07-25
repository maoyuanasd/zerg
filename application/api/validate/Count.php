<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/25
 * Time: 13:45
 */

namespace app\api\validate;


class Count extends BaseValidate
{
   protected $rule=[
       'count'=>'isPositiveInteger|between:1,15'
   ];
    protected $message=[
        'count'=>'count参数必须是1到15之间的正整数'
    ];
}