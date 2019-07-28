<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/27
 * Time: 8:43
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
   protected $hidden=['img_id','delete_time','product_id'];
   public function imgUrl(){
       return $this->belongsTo('Image','img_id','id');
   }
}