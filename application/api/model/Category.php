<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/25
 * Time: 14:53
 */

namespace app\api\model;


class Category extends BaseModel
{
   protected $hidden=['delete_time','update_time','create_time'];
  public function  img(){
      return $this->belongsTo('Image','topic_img_id','id');
  }
}