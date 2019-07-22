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

class Banner
{
    public static function getBannerByID($id)
    {
//     $result=  Db::query('select*from banner_item where banner_id=?',[$id]);
//     return $result;
//        $result = Db::table('banner_item')
//            ->where('banner_id', '=', $id)
//            ->select();
//      where('字段名','表达式','查询条件');
        //表达式,数组发,闭包
        //     updete,delete,insert,find
        $result = Db::table('banner_item')
//            ->fetchSql()
            ->where(function ($query) use ($id) {
                $query->where('banner_id', '=', $id);
            })
            ->select();
        return $result;
    }
}