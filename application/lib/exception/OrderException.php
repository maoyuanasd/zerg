<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/29
 * Time: 14:33
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
   public $code=404;
    public $msg='订单不存在,请检查ID';
    public $errorCode=80000;
}