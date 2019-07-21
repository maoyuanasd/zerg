<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/21
 * Time: 16:14
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}