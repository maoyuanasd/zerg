<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 16:50
 */

namespace app\api\controller\v1;

use think\Validate;
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
        $data=[
            'name'=> 'vendor55555555555',
            'email'=>'vendor@qq.com'
        ];
        $validate = new Validate([
            'name'=>'require|max:10',
            'email' =>'email'
        ]);
        $result=$validate->check($data);
        echo  $validate->getError();
    }
}