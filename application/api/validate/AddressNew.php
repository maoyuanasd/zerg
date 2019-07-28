<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/27
 * Time: 11:16
 */

namespace app\api\validate;


class AddressNew extends BaseValidate
{
   protected $rule=[
       'name'=>'require|isNotEmpty',
       'mobile'=>'require|isMobile',
       'province'=>'require|isNotEmpty',
       'city'=>'require|isNotEmpty',
       'country'=>'require|isNotEmpty',
       'detail'=>'require|isNotEmpty',
   ];
}