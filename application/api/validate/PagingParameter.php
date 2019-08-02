<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/2
 * Time: 11:54
 */

namespace app\api\validate;


class PagingParameter extends BaseValidate
{
   protected $rule=[
       'page'=>'isPositiveInteger',
       'size'=>'isPositiveInteger'
   ];
    protected $message=[
        'page'=>'分页参数必须是正整数',
        'size'=>'分页参数必须是正整数'
    ];
}