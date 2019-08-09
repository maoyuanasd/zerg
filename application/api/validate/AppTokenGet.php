<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/9
 * Time: 14:11
 */

namespace app\api\validate;


class AppTokenGet extends BaseValidate
{
     protected $rule=[
         'ac' => 'require|isNotEmpty',
         'se' => 'require|isNotEmpty'
     ];
}