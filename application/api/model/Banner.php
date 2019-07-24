<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 19:33
 */

namespace app\api\model;


use think\Db;
use think\Exception;
use think\Model;

class Banner extends BaseModel
{
    protected $hidden=['delete_time','update_time'];
    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }
    public static function getBannerByID($id)
    {
        $banner=self::with(['items','items.img'])->find($id);
        return $banner;
    }
}