<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 16:50
 */

namespace app\api\controller\v2;

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
        return 'this is v2';
    }
}