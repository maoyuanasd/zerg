<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/28
 * Time: 18:32
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden=['id','delete_time','user_id'];
}