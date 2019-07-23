<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/23
 * Time: 17:09
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value,$data){
        $finaUrl=$value;
        if($data['from']==1){
            $finaUrl= config('setting.img_prefix').$value;
        }
        return   $finaUrl;
    }
}