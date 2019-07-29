<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/29
 * Time: 17:13
 */

namespace app\api\model;


class Order extends BaseModel
{
   protected $hidden=['user_id','delete_time','update_time'];
}