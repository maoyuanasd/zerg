<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/25
 * Time: 22:28
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过去成无效Token';
    public $errorCode = 10001;
}