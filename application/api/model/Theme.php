<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/24
 * Time: 10:28
 */

namespace app\api\model;



class Theme extends BaseModel
{protected $hidden=['delete_time','update_time','head_img_id','topic_img_id'];
   public function topicImg(){
       //$this->hasOne() 外键存在于相关联的表
       //$this->belongsTo() 外键存在于自己的表
       return $this->belongsTo('Image','topic_img_id','id');
   }
   public function headImg(){
       return $this->belongsTo('Image','head_img_id','id');
   }
   public function products(){
       return $this->belongsToMany('product','theme_product',
           'product_id','theme_id');
   }
   public static function getThemeWithProducts($id){
       $theme=self::with('products,topicImg,headImg')->find($id);
       return $theme;
   }
}