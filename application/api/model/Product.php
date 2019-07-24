<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/24
 * Time: 10:27
 */

namespace app\api\model;



class Product extends BaseModel
{
  protected $hidden=['delete_time','main_img_id','pivot','from','category_id','create_time','update_time'];
}