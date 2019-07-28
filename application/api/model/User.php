<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/25
 * Time: 16:45
 */

namespace app\api\model;


class User extends BaseModel
{
    public function address(){
        return$this->hasOne('UserAddress','user_id','id');
    }
    public static function getByOpenID($openid){
        $user=self::where('openid','=',$openid)->find();
        return $user;
    }

}