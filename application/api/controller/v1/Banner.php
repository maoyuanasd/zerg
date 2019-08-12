<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 16:50
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModle;
use app\lib\exception\BannerMissException;
use think\Exception;

class Banner
{
    /*
     * 获取指定id的banner信息
     * @id banner的id号
     * @url /banner/:id
     * @http GET
     * */
    public  function  getBanner($id)
    {
        //AOP 面向切面编程
        (new IDMustBePostiveInt())->goCheck();
        //php think optimize:route
        $banner = BannerModle::getBannerByID($id);
        if(!$banner){
            throw new BannerMissException();
        }
        return $banner;
    }
}