<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/9
 * Time: 14:21
 */

namespace app\api\model;


class ThirdApp extends BaseModel
{
   public static function check($ac,$se){
       $app=self::where('app_id','=',$ac)
           ->where('app_secret','=',$se)
           ->find();
       return $app;
   }
}