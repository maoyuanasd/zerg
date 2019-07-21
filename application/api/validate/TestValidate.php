<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 9:09
 */

namespace app\api\validate;

use think\Validate;
class TestValidate extends Validate
{
   protected $rule=[
       'name'=>'require|max:10',
       'email' =>'email'
   ];
}