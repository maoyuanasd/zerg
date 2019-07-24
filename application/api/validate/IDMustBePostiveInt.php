<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 9:23
 */

namespace app\api\validate;

class IDMustBePostiveInt extends BaseValidate
{

  protected  $rule =[
      'id'=>'require|isPositiveInteger',
  ];
  protected $message=[
      'id'=>'id必须是正整数'
  ];
}