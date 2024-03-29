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
    protected $autoWriteTimestamp=true;
    public function getSnapItemsAttr($value){
        if(empty($value)){
            return null;
        }
        return json_decode($value);
    }
    public function getSnapAddressAttr($value){
        if(empty($value)){
            return null;
        }
        return json_decode($value);
    }
    public static function getSummaryByUser($uid,$page=1,$size=15){
       $pagingDate= self::where('user_id','=',$uid)
            ->order('create_time desc')
            ->paginate($size,true,['page'=>$page]);
         return $pagingDate;
    }
    public static function getSummaryByPage($page=1, $size=20){
        $pagingData = self::order('create_time desc')
            ->paginate($size, true, ['page' => $page]);
        return $pagingData ;
    }
}