<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/27
 * Time: 21:16
 */

namespace app\lib\exception;


class UserException extends BaseException
{
   public $code=404;
   public $msg='用户不存在';
   public $errorCode=60000;
}